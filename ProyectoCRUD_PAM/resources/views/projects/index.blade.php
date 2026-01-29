<x-app-layout>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">{{ __('ui.projects') }}</h1>
            <p class="mt-1 text-gray-400">Listado cargado desde seeders.</p>
        </div>
    </div>

    <section class="mt-8 grid gap-4 sm:grid-cols-2">
        @forelse ($projects as $project)
            <article class="rounded-2xl border border-gray-800 bg-gray-900/40 p-6">
                <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                @if($project->description)
                    <p class="mt-2 text-sm text-gray-400">{{ $project->description }}</p>
                @endif
                <p class="mt-4 text-xs text-gray-500">
                    {{ $project->created_at->format('d/m/Y') }}
                </p>
            </article>
        @empty
            <p class="text-gray-400">No hay proyectos.</p>
        @endforelse
    </section>
</x-app-layout>
