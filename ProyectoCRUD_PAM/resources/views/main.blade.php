<x-app-layout>
    @guest
        {{-- VISITANTE (NO autenticado) --}}
        <section class="rounded-2xl border border-gray-800 bg-gray-900/40 p-8">
            <h1 class="text-3xl font-semibold">Bienvenido</h1>
            <p class="mt-2 text-gray-400">
                Aplicación web en Laravel: componentes Blade, autenticación, CRUD y traducciones.
            </p>

            <div class="mt-6 flex gap-3">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                        Login
                    </a>
                @else
                    <span class="rounded-xl border border-gray-800 px-4 py-2 text-gray-500">
                        Login (pendiente)
                    </span>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
                        Register
                    </a>
                @else
                    <span class="rounded-xl border border-gray-800 px-4 py-2 text-gray-500">
                        Register (pendiente)
                    </span>
                @endif
            </div>
        </section>
    @endguest

    @auth
        {{-- USUARIO autenticado --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Hola, {{ auth()->user()->name }}</h1>
                <p class="mt-1 text-gray-400">Selecciona una opción.</p>
            </div>

            {{-- Logout (requiere POST) --}}
            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-800">
                        Logout
                    </button>
                </form>
            @endif
        </div>

        <section class="mt-8 grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">Proyectos</h2>
                <p class="mt-1 text-sm text-gray-400">Accede a la sección de proyectos.</p>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Próximamente</span>
                </div>
            </div>

            <div class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">Alumnos</h2>
                <p class="mt-1 text-sm text-gray-400">Gestiona alumnos (CRUD).</p>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Próximamente</span>
                </div>
            </div>
        </section>
    @endauth
</x-app-layout>
