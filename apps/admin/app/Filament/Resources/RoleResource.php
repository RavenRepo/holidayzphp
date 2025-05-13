<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationGroup = 'Access Management';

    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return __('Role');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Roles');
    }

    public static function form(Form $form): Form
    {
        // Get permissions grouped by category
        $permissionsByCategory = Permission::where('guard_name', 'admin')
            ->get()
            ->map(function ($permission) {
                // Extract category from permission name (e.g., 'manage packages' -> 'packages')
                $parts = explode(' ', $permission->name);
                $category = count($parts) > 1 ? end($parts) : 'general';
                
                // Handle special cases
                if ($category === 'panel') {
                    $category = 'admin';
                }
                
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'category' => $category,
                ];
            })
            ->groupBy('category')
            ->toArray();

        // Sort categories alphabetically
        ksort($permissionsByCategory);

        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Role Name')
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('description')
                            ->label('Role Description')
                            ->placeholder('Describe the purpose and responsibilities of this role')
                            ->maxLength(500)
                            ->columnSpan('full'),
                            
                        Forms\Components\Hidden::make('guard_name')
                            ->default('admin')
                            ->required(),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Permissions')
                    ->description('Select the permissions for this role')
                    ->schema(
                        collect($permissionsByCategory)->map(function ($permissions, $category) {
                            return Forms\Components\Section::make(ucfirst($category) . ' Permissions')
                                ->schema([
                                    Forms\Components\CheckboxList::make('permissions_' . $category)
                                        ->label('')
                                        ->options(
                                            collect($permissions)->pluck('name', 'id')->toArray()
                                        )
                                        ->relationship('permissions', 'id')
                                        ->columnSpan('full')
                                ])
                                ->collapsible()
                                ->columns(1);
                        })->toArray()
                    )
                    ->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Role Name')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state, Model $record): string => 
                        in_array($state, ['admin', 'manager', 'editor', 'customer']) 
                            ? $state . ' 🔒' 
                            : $state
                    )
                    ->tooltip(fn (Model $record): ?string => 
                        in_array($record->name, ['admin', 'manager', 'editor', 'customer'])
                            ? 'System role - use caution when editing'
                            : null
                    )
                    ->color('primary'),
                    
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(fn (Model $record): ?string => $record->description)
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('guard_name')
                    ->label('Guard')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('permissions_count')
                    ->counts('permissions')
                    ->label('Permissions')
                    ->sortable()
                    ->color('success'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->tooltip('Edit this role'),
                    
                Tables\Actions\DeleteAction::make()
                    ->tooltip('Delete this role')
                    ->hidden(fn (Model $record): bool => 
                        in_array($record->name, ['admin', 'manager', 'editor', 'customer'])
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
