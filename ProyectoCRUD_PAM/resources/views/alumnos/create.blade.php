<x-app-layout>
    <h1 class="text-2xl font-semibold">Nuevo alumno</h1>

    <form method="POST" action="{{ route('alumnos.store') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm text-gray-300">Nombre</label>
            <input name="nombre" value="{{ old('nombre') }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('nombre') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-300">Apellidos</label>
            <input name="apellidos" value="{{ old('apellidos') }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('apellidos') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-300">Email</label>
            <input name="email" type="email" value="{{ old('email') }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('email') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2">
            <button class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
                Guardar
            </button>

            <a href="{{ route('alumnos.index') }}"
               class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
                Cancelar
            </a>

            <a href="{{ url()->previous() }}"
               class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
                Volver
            </a>
        </div>
    </form>
</x-app-layout>

