<x-app-layout>
    <h1 class="text-2xl font-semibold">{{ __('ui.edit') }} · {{ __('ui.students_title') }}</h1>

    <form method="POST" action="{{ route('alumnos.update', $alumno) }}" class="mt-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="text-sm text-gray-300">{{ __('ui.name') }}</label>
            <input name="nombre" value="{{ old('nombre', $alumno->nombre) }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('nombre') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-300">{{ __('ui.surname') }}</label>
            <input name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('apellidos') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-300">Email</label>
            <input name="email" type="email" value="{{ old('email', $alumno->email) }}"
                   class="mt-1 w-full rounded-xl border border-gray-800 bg-gray-950 p-2">
            @error('email') <p class="mt-1 text-sm text-red-300">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2">
            <button class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
                {{ __('ui.save_changes') }}
            </button>

            <a href="{{ route('alumnos.index') }}"
               class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
                {{ __('ui.cancel') }}
            </a>

            <a href="{{ url()->previous() }}"
               class="rounded-xl border border-gray-700 px-4 py-2 hover:bg-gray-900">
                {{ __('ui.back') }}
            </a>
        </div>
    </form>
</x-app-layout>
