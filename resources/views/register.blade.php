<x-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-form.fieldset>
                <!-- name -->
                <div>
                    <x-form.label for="name">{{ __('Name') }} *</x-form.label>
                    <x-form.input name="name" type="text" />
                </div>
                <!-- email -->
                <div>
                    <x-form.label for="email">{{ __('Email') }} *</x-form.label>
                    <x-form.input name="email" type="email" />
                </div>
                <!-- password -->
                <div>
                    <x-form.label for="password">{{ __('Password') }} *</x-form.label>
                    <x-form.input name="password" type="password" />
                </div>
                <!-- password_confirmation -->
                <div>
                    <x-form.label for="password_confirmation">{{ __('Confirm Password') }} *</x-form.label>
                    <x-form.input name="password_confirmation" type="password" />
                </div>
                <!-- invite -->
                <div>
                    <x-form.label for="invite">{{ __('Invite Code') }} *</x-form.label>
                    <x-form.input name="invite" type="text" />
                </div>
                <!-- url -->
                <div>
                    <x-form.label for="url">{{ __('URL') }}</x-form.label>
                    <x-form.input name="url" placeholder="{{ __('Optional: A link to your online profile.') }}" type="url" />
                </div>
                <x-button theme="success">{{ __('Register') }}</x-button>
            </x-form.fieldset>
        </form>
    </x-auth-card>
</x-layout>
