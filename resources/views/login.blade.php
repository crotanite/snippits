<x-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-form.fieldset>
                <!-- email -->
                <div>
                    <x-form.label for="email">{{ __('Email') }}</x-form.label>
                    <x-form.input name="email" type="email" />
                </div>
                <!-- password -->
                <div>
                    <x-form.label for="password">{{ __('Password') }}</x-form.label>
                    <x-form.input name="password" type="password" />
                </div>
                <x-button theme="success">{{ __('Login') }}</x-button>
            </x-form.fieldset>
        </form>
    </x-auth-card>
</x-layout>
