@extends('layouts.app')

@section('title', 'UI Component Demo')

@section('content')
    <x-ui.layout.page-heading>
        UI Component Library
        <x-slot:subtitle>Examples and usage for the Holidayz Manager UI components</x-slot:subtitle>
    </x-ui.layout.page-heading>

    <x-ui.layout.section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Alert Component</h2>
        <p class="mb-4">Use alerts to provide feedback messages or important notifications to users.</p>
        
        <div class="space-y-4">
            <h3 class="text-xl font-semibold">Types</h3>
            
            <x-ui.feedback.alert type="info" title="Information">
                This is an informational alert. Use it to provide neutral information to users.
            </x-ui.feedback.alert>
            
            <x-ui.feedback.alert type="success" title="Success">
                This is a success alert. Use it to indicate a successful operation.
            </x-ui.feedback.alert>
            
            <x-ui.feedback.alert type="warning" title="Warning">
                This is a warning alert. Use it to warn users about potential issues.
            </x-ui.feedback.alert>
            
            <x-ui.feedback.alert type="error" title="Error">
                This is an error alert. Use it to inform users about errors or problems.
            </x-ui.feedback.alert>
            
            <h3 class="text-xl font-semibold mt-6">Options</h3>
            
            <x-ui.feedback.alert type="info" :icon="false">
                This alert has no icon.
            </x-ui.feedback.alert>
            
            <x-ui.feedback.alert type="info" :title="null">
                This alert has no title.
            </x-ui.feedback.alert>
            
            <x-ui.feedback.alert type="warning" :dismissible="true">
                This alert is dismissible. Click the X to dismiss it.
            </x-ui.feedback.alert>
            
            <div class="mt-6 p-4 bg-gray-100 rounded-md">
                <h4 class="text-lg font-semibold mb-2">Usage</h4>
                <pre class="bg-gray-800 text-white p-4 rounded overflow-x-auto text-sm">&lt;x-ui.feedback.alert 
    type="info|success|warning|error" 
    title="Optional Title"
    :dismissible="true|false"
    :icon="true|false"&gt;
    Alert content goes here
&lt;/x-ui.feedback.alert&gt;</pre>
            </div>
        </div>
    </x-ui.layout.section>

    <x-ui.layout.section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Modal Component</h2>
        <p class="mb-4">Use modals for dialogs, forms, or any content that requires user attention.</p>
        
        <div class="space-y-6">
            {{-- Basic Modal Example --}}
            <div>
                <h3 class="text-xl font-semibold mb-2">Basic Modal</h3>
                <x-ui.forms.button @click="openModal('demo-modal')">
                    Open Basic Modal
                </x-ui.forms.button>
                
                <x-ui.feedback.modal id="demo-modal" title="Example Modal">
                    <p>This is the content of the modal. You can include any HTML or components here.</p>
                    <p class="mt-4">Modals can be closed by:</p>
                    <ul class="list-disc ml-6 mt-2">
                        <li>Clicking the X button</li>
                        <li>Clicking outside the modal</li>
                        <li>Pressing the ESC key</li>
                    </ul>
                    
                    <div class="mt-4 flex justify-end">
                        <x-ui.forms.button @click="closeModal('demo-modal')" variant="outline" class="mr-2">
                            Cancel
                        </x-ui.forms.button>
                        <x-ui.forms.button>
                            Confirm
                        </x-ui.forms.button>
                    </div>
                </x-ui.feedback.modal>
            </div>
            
            {{-- Modal with Footer --}}
            <div>
                <h3 class="text-xl font-semibold mb-2">Modal with Footer</h3>
                <x-ui.forms.button @click="openModal('modal-with-footer')" variant="secondary">
                    Open Modal with Footer
                </x-ui.forms.button>
                
                <x-ui.feedback.modal id="modal-with-footer" title="Modal with Footer">
                    <p>This modal has a dedicated footer section for actions.</p>
                    
                    <x-slot:footer>
                        <div class="flex justify-end space-x-2">
                            <x-ui.forms.button @click="closeModal('modal-with-footer')" variant="outline">
                                Cancel
                            </x-ui.forms.button>
                            <x-ui.forms.button>
                                Save Changes
                            </x-ui.forms.button>
                        </div>
                    </x-slot:footer>
                </x-ui.feedback.modal>
            </div>
            
            {{-- Different Width Modal --}}
            <div>
                <h3 class="text-xl font-semibold mb-2">Different Sizes</h3>
                <div class="flex flex-wrap gap-2">
                    <x-ui.forms.button @click="openModal('modal-sm')" variant="outline" size="sm">
                        Small
                    </x-ui.forms.button>
                    <x-ui.forms.button @click="openModal('modal-md')" variant="outline" size="sm">
                        Medium (Default)
                    </x-ui.forms.button>
                    <x-ui.forms.button @click="openModal('modal-lg')" variant="outline" size="sm">
                        Large
                    </x-ui.forms.button>
                    <x-ui.forms.button @click="openModal('modal-xl')" variant="outline" size="sm">
                        Extra Large
                    </x-ui.forms.button>
                </div>
                
                <x-ui.feedback.modal id="modal-sm" title="Small Modal" maxWidth="sm">
                    <p>This is a small modal (sm:max-w-sm).</p>
                </x-ui.feedback.modal>
                
                <x-ui.feedback.modal id="modal-md" title="Medium Modal">
                    <p>This is a medium modal (sm:max-w-md). This is the default size.</p>
                </x-ui.feedback.modal>
                
                <x-ui.feedback.modal id="modal-lg" title="Large Modal" maxWidth="lg">
                    <p>This is a large modal (sm:max-w-lg).</p>
                </x-ui.feedback.modal>
                
                <x-ui.feedback.modal id="modal-xl" title="Extra Large Modal" maxWidth="xl">
                    <p>This is an extra large modal (sm:max-w-xl).</p>
                </x-ui.feedback.modal>
            </div>
            
            <div class="mt-6 p-4 bg-gray-100 rounded-md">
                <h4 class="text-lg font-semibold mb-2">Usage</h4>
                <pre class="bg-gray-800 text-white p-4 rounded overflow-x-auto text-sm">&lt;x-ui.feedback.modal 
    id="unique-modal-id" 
    title="Optional Title"
    maxWidth="sm|md|lg|xl|2xl|full"
    :closeButton="true|false"&gt;
    
    Modal content goes here
    
    &lt;x-slot:footer&gt;
        Optional footer content
    &lt;/x-slot:footer&gt;
&lt;/x-ui.feedback.modal&gt;

&lt;!-- JavaScript to open/close the modal --&gt;
&lt;button @click="openModal('unique-modal-id')"&gt;Open Modal&lt;/button&gt;
&lt;button @click="closeModal('unique-modal-id')"&gt;Close Modal&lt;/button&gt;</pre>
            </div>
        </div>
    </x-ui.layout.section>
@endsection 