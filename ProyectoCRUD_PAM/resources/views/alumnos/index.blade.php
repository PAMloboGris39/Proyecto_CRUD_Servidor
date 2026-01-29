<x-app-layout>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">{{ __('ui.students_title') }}</h1>
            <p class="mt-1 text-gray-400">{{ __('ui.students_subtitle') }}</p>
        </div>

        <a href="{{ route('alumnos.create') }}"
           class="rounded-xl bg-white px-4 py-2 text-gray-900 hover:opacity-90">
            {{ __('ui.new_student') }}
        </a>
    </div>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-green-800 bg-green-900/30 p-4 text-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 overflow-hidden rounded-2xl border border-gray-800">
        <table class="w-full text-sm">
            <thead class="bg-gray-900/60 text-gray-300">
            <tr>
                <th class="px-4 py-3 text-left">ID</th>
                <th class="px-4 py-3 text-left">{{ __('ui.name') }}</th>
                <th class="px-4 py-3 text-left">{{ __('ui.surname') }}</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-right">{{ __('ui.actions') }}</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-800 bg-gray-950">
            @forelse ($alumnos as $alumno)
                <tr>
                    <td class="px-4 py-3 text-gray-400">{{ $alumno->id }}</td>
                    <td class="px-4 py-3">{{ $alumno->nombre }}</td>
                    <td class="px-4 py-3">{{ $alumno->apellidos }}</td>
                    <td class="px-4 py-3 text-gray-300">{{ $alumno->email }}</td>
                    <td class="px-4 py-3">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('alumnos.show', $alumno) }}"
                               class="rounded-lg border border-gray-700 px-3 py-1 hover:bg-gray-900">
                                {{ __('ui.view') }}
                            </a>

                            <a href="{{ route('alumnos.edit', $alumno) }}"
                               class="rounded-lg border border-gray-700 px-3 py-1 hover:bg-gray-900">
                                {{ __('ui.edit') }}
                            </a>

                            <form method="POST"
                                  action="{{ route('alumnos.destroy', $alumno) }}"
                                  class="js-delete">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        data-nombre="{{ $alumno->nombre }} {{ $alumno->apellidos }}"
                                        class="rounded-lg border border-red-800 px-3 py-1 text-red-200 hover:bg-red-900/30">
                                    {{ __('ui.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-4 py-6 text-gray-400" colspan="5">
                        {{ __('ui.no_students') }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $alumnos->links() }}
    </div>
</x-app-layout>
