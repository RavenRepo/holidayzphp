<?php

namespace Holidayz\Packages\Core\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    /**
     * Boot the trait, adding a creating observer.
     *
     * When creating a new model, generate a UUID.
     */
    protected static function bootUsesUuid(): void
    {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Tell Eloquent that the model does not use auto-incrementing IDs.
     *
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Tell Eloquent the primary key type is string.
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
