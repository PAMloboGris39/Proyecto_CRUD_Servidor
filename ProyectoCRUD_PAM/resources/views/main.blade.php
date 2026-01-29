<x-app-layout>
    @guest
        <section class="rounded-2xl border border-gray-800 bg-gray-900/40 p-8">
            <h1 class="text-3xl font-semibold">{{ __('ui.welcome_title') }}</h1>
            <p class="mt-2 text-gray-400">{{ __('ui.welcome_subtitle') }}</p>

            <div class="mt-6 flex gap-3">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                        {{ __('ui.login') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
                        {{ __('ui.register') }}
                    </a>
                @endif
            </div>
        </section>
    @endguest

    @auth
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Hola, {{ auth()->user()->name }}</h1>
                <p class="mt-1 text-gray-400">Selecciona una opción.</p>
            </div>

            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                        {{ __('ui.logout') }}
                    </button>
                </form>
            @endif
        </div>

        <section class="mt-8 grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">{{ __('ui.projects') }}</h2>
                <p class="mt-1 text-sm text-gray-400">Accede a la sección de proyectos.</p>
                <a href="{{ route('projects.index') }}"
                   class="mt-4 inline-block rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                    {{ __('ui.projects') }}
                </a>
            </div>

            <div class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">{{ __('ui.students') }}</h2>
                <p class="mt-1 text-sm text-gray-400">Gestiona alumnos (CRUD).</p>
                <a href="{{ route('alumnos.index') }}"
                   class="mt-4 inline-block rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                    {{ __('ui.students') }}
                </a>
            </div>
        </section>
    @endauth
</x-app-layout>
