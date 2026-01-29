<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <!-- Left: Logo + Links -->
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('main') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('main')" :active="request()->routeIs('main')">
                        {{ __('ui.home') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                            {{ __('ui.projects') }}
                        </x-nav-link>

                        <x-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')">
                            {{ __('ui.students') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Right: Language switcher + Settings dropdown -->
            <div class="flex items-center gap-4">
                <!-- Language Switcher (Desktop) -->
                <div class="hidden items-center gap-2 sm:flex">
                    <a href="{{ route('lang.switch', 'es') }}" class="text-sm hover:underline underline-offset-4">ES</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="text-sm hover:underline underline-offset-4">EN</a>
                    <a href="{{ route('lang.switch', 'fr') }}" class="text-sm hover:underline underline-offset-4">FR</a>

                    <span class="text-xs opacity-60">
                        ({{ strtoupper(app()->getLocale()) }})
                    </span>
                </div>

                <!-- Settings Dropdown (Desktop) -->
                <div class="hidden sm:ms-6 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300"
                            >
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    {{ __('ui.logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger (Mobile) -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button
                        @click="open = ! open"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
                    >
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('main')" :active="request()->routeIs('main')">
                {{ __('ui.home') }}
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                    {{ __('ui.projects') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')">
                    {{ __('ui.students') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Language Switcher (Mobile) -->
        <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-600">
            <div class="flex items-center gap-3">
                <span class="text-xs opacity-60">
                    {{ strtoupper(app()->getLocale()) }}
                </span>

                <a href="{{ route('lang.switch', 'es') }}" class="text-sm hover:underline underline-offset-4">ES</a>
                <a href="{{ route('lang.switch', 'en') }}" class="text-sm hover:underline underline-offset-4">EN</a>
                <a href="{{ route('lang.switch', 'fr') }}" class="text-sm hover:underline underline-offset-4">FR</a>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        {{ __('ui.logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
