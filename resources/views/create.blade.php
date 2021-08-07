<x-layout>
    <x-card>
        <form method="POST" action="{{ route('create') }}">
            @csrf
            <x-form.fieldset>
                <livewire:torchlight-snippet />
                <!-- tags -->
                <div>
                    <x-form.label for="tags">{{ __('Tags') }}</x-form.label>
                </div>
                <!-- url -->
                <div>
                    <x-form.label for="url">{{ __('Direct URL') }}</x-form.label>
                    <x-form.input name="url" type="url" />
                </div>
                <!-- anonymous -->
                <div class="text-center">
                    <x-form.checkbox name="anonymous" />
                    <x-form.label class="inline">{{ __('Anonymous?') }}</x-form.label>
                </div>
                <!-- submit -->
                <div class="text-right">
                    <x-button theme="success">{{ __('Create') }}</x-button>
                </div>
            </x-form.fieldset>
        </form>
    </x-card>
</x-layout>
