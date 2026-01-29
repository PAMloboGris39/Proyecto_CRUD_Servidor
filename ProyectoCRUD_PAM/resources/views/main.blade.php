<x-app-layout>
    @guest
        {{-- VISITANTE (NO autenticado) --}}
        <section class="rounded-2xl border border-gray-800 bg-gray-900/40 p-8">
            <h1 class="text-3xl font-semibold">{{ __('ui.welcome_title') }}</h1>

            <p class="mt-2 text-gray-400">
                {{ __('ui.welcome_subtitle') }}
            </p>

            <div class="mt-6 flex gap-3">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                        {{ __('ui.login') }}
                    </a>
                @else
                    <span class="rounded-xl border border-gray-800 px-4 py-2 text-gray-500">
                        {{ __('ui.login') }} ({{ __('ui.pending') ?? 'pendiente' }})
                    </span>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
                        {{ __('ui.register') }}
                    </a>
                @else
                    <span class="rounded-xl border border-gray-800 px-4 py-2 text-gray-500">
                        {{ __('ui.register') }} ({{ __('ui.pending') ?? 'pendiente' }})
                    </span>
                @endif
            </div>
        </section>
    @endguest

    @auth
        {{-- USUARIO autenticado --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">
                    {{ __('ui.hello') ?? 'Hola' }}, {{ auth()->user()->name }}
                </h1>
                <p class="mt-1 text-gray-400">{{ __('ui.choose_option') ?? 'Selecciona una opción.' }}</p>
            </div>

            {{-- Logout (requiere POST) --}}
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
                <p class="mt-1 text-sm text-gray-400">
                    {{ __('ui.projects_desc') ?? 'Accede a la sección de proyectos.' }}
                </p>

                <div class="mt-4">
                    @if (Route::has('projects.index'))
                        <a href="{{ route('projects.index') }}"
                           class="inline-block rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                            {{ __('ui.go_to_projects') ?? 'Ir a Proyectos' }}
                        </a>
                    @else
                        <span class="text-gray-500 text-sm">{{ __('ui.soon') ?? 'Próximamente' }}</span>
                    @endif
                </div>
            </div>

            <div class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">{{ __('ui.students') }}</h2>
                <p class="mt-1 text-sm text-gray-400">
                    {{ __('ui.students_desc') ?? 'Gestiona alumnos (CRUD).' }}
                </p>

                <div class="mt-4">
                    @if (Route::has('alumnos.index'))
                        <a href="{{ route('alumnos.index') }}"
                           class="inline-block rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                            {{ __('ui.go_to_students') ?? 'Ir a Alumnos' }}
                        </a>
                    @else
                        <span class="text-gray-500 text-sm">{{ __('ui.soon') ?? 'Próximamente' }}</span>
                    @endif
                </div>
            </div>
        </section>
    @endauth
</x-app-layout>
