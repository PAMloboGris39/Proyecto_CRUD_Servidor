<x-app-layout>
    <h1 class="text-2xl font-semibold">Detalle del alumno</h1>

    <div class="mt-6 rounded-2xl border border-gray-800 bg-gray-900/40 p-6 space-y-2">
        <p><span class="text-gray-400">Nombre:</span> {{ $alumno->nombre }}</p>
        <p><span class="text-gray-400">Apellidos:</span> {{ $alumno->apellidos }}</p>
        <p><span class="text-gray-400">Email:</span> {{ $alumno->email }}</p>
    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('alumnos.edit', $alumno) }}"
           class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
            Editar
        </a>

        <a href="{{ route('alumnos.index') }}"
           class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
            Volver
        </a>
    </div>
</x-app-layout>
