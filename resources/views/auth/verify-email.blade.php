<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/image/logo_ada2.png" style="width: 50%, center" >
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Merci de vous etre inscrip. clique sur le lien pour vous verifier votre email') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('un nouveau lien de verification a été envoyer sur votre email.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Renvoyer un lien de virification d\'email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
