<x-authentication-layout>
    <div class="border-2 p-4 rounded-lg">
        <h1 class="text-3xl text-slate-800 text-center dark:text-slate-100 font-bold mb-6">{{ __('LES PROS KARA') }}</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif   
        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
                </div>
                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />                
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <div class="mr-1">
                        <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                            {{ __('Mot de  passe oublié ?') }}
                        </a>
                    </div>
                @endif            
                <x-jet-button class="ml-3">
                    {{ __('connexion') }}
                </x-jet-button>            
            </div>
        </form>
        <x-jet-validation-errors class="mt-4" />   
    <!-- Footer -->
        <div class="pt-5 mt-6 border-t border-slate-200">
            <div class="text-sm">
                {{ __('Pas de compte?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">{{ __('crée un') }}</a>
            </div>
        </div>
    </div>
</x-authentication-layout>
