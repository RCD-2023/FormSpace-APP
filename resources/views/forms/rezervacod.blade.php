{{-- Codul UI hardcodat multicheckbox --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 ">
    <div class="flex items-center">
        <input id="manufacturer-checkbox" name="b_type[]" type="checkbox" value="Manufacturer"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Manufacturer', old('b_type', [])) ? 'checked' : '' }}>
        <label for="manufacturer-checkbox"
            class="select-none ms-2 text-sm font-medium text-heading">Manufacturer</label>
    </div>
    <div class="flex items-center">
        <input id="infServ-checkbox" name="b_type[]" type="checkbox" value="Inf Services"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Inf Services', old('b_type', [])) ? 'checked' : '' }}>
        <label for="infServ-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Inf
            Services</label>
    </div>
    <div class="flex items-center">
        <input id="retail-checkbox" name="b_type[]" type="checkbox" value="Retail"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Retail', old('b_type', [])) ? 'checked' : '' }}>
        <label for="retail-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Retail</label>
    </div>
    <div class="flex items-center">
        <input id="trading-checkbox" name="b_type[]" type="checkbox" value="Trading"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Trading', old('b_type', [])) ? 'checked' : '' }}>
        <label for="trading-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Trading</label>
    </div>
    <div class="flex items-center">
        <input id="consult-checkbox" name="b_type[]" type="checkbox" value="Consultancy"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Consultancy', old('b_type', [])) ? 'checked' : '' }}>
        <label for="consult-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Consultancy</label>
    </div>
    <div class="flex items-center">
        <input id="dev-checkbox" name="b_type[]" type="checkbox" value="Web Dev"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Web Dev', old('b_type', [])) ? 'checked' : '' }}>
        <label for="dev-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Web
            Dev</label>
    </div>
    <div class="flex items-center">
        <input id="other-checkbox" name="b_type[]" type="checkbox" value="Other"
            class="w-4 h-4 border border-gray-400 rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
            {{ in_array('Other', old('b_type', [])) ? 'checked' : '' }}>
        <label for="other-checkbox" class="select-none ms-2 text-sm font-medium text-heading">Other</label>
    </div>
</div>

{{-- Codul nav pana sa folosesc @auth --}}

<nav class="hidden md:flex items-center space-x-4">
    @if (request()->routeIs('homepage'))
        <x-nav-link url="/login" :active="request()->is('login')" icon="user">Login</x-nav-link>
    @endif
    {{-- --}}
    @if (request()->routeIs('forms.index'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif
    {{-- --}}
    @if (request()->routeIs('forms.create'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif

    @if (request()->routeIs('forms.show'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif
    @if (request()->routeIs('forms.edit'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif
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
    @if (request()->routeIs('homepage'))
        <x-nav-link url="/login" :active="request()->is('login')" icon="user" :mobile="true">Login</x-nav-link>
    @endif
    {{-- Listarea in pagina principala cu index() --}}
    @if (request()->routeIs('forms.index'))
        <x-nav-link url="/forms" :active="request()->is('forms')" :mobile="true">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket" :mobile="true">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit" :block="true">Add Entry</x-button-link>
    @endif
    {{-- Forms create, afiseaza formul de completare --}}
    @if (request()->routeIs('forms.create'))
        <x-nav-link url="/forms" :active="request()->is('forms')" :mobile="true">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket" :mobile="true">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit" :block="true">Add Entry</x-button-link>
    @endif

    @if (request()->routeIs('forms.show'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif
    @if (request()->routeIs('forms.edit'))
        <x-nav-link url="/forms" :active="request()->is('forms')">All Entries</x-nav-link>
        <x-nav-link url="/" :active="request()->is('/')" icon="right-from-bracket">Logout</x-nav-link>
        <x-button-link url="/forms/create" icon="edit">Add Entry</x-button-link>
    @endif
</nav>