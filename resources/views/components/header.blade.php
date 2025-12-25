<!-- Header -->
<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-baseline">
            <a href="{{ url('/') }}" class="text-3xl font-semibold">
                FormSpace
            </a>
            <span class="text-sm text-gray-200 pl-2">
                Collect data through dedicated forms.
            </span>
        </div>

        <nav class="hidden md:flex items-center space-x-4">
            @auth
                <x-nav-link url="/entries" :active="request()->is('forms')">All Entries</x-nav-link>
                <x-nav-link url="/logout" :active="request()->is('/logout')" icon="right-from-bracket">Logout</x-nav-link>
                <x-button-link url="/entries/create" icon="edit">Add Entry</x-button-link>
            @else
                <x-nav-link url="/login" :active="request()->is('login')" icon="user">Login</x-nav-link>
            @endauth

        </nav>
        @if (!request()->is('login'))
            <button id="hamburger" class="text-white md:hidden flex items-center">
                <i class="fa fa-bars text-2xl"></i>
            </button>
        @endif

    </div>
    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="hidden md:hidden bg-blue-600 text-white mt-5 pb-4 space-y-2">
        {{-- Home care trimite direct login --}}
        @auth
            <x-nav-link url="/entries" :active="request()->is('forms')" :mobile="true">All Entries</x-nav-link>
            <x-nav-link url="/logout" :active="request()->is('/logout')" icon="right-from-bracket"
                :mobile="true">Logout</x-nav-link>
            <x-button-link url="/entries/create" icon="edit" :mobile="true">Add Entry</x-button-link>
        @else
            <x-nav-link url="/login" :active="request()->is('login')" icon="user" :mobile="true">Login</x-nav-link>
        @endauth
    </nav>
</header>