<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$task->name" required />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="project_id" :value="__('Project')"/>

                            <x-select id="project_id" name="project_id" class="block mt-1 w-full">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" @selected($project->id == $task->project_id)>{{ $project->name }}</option>
                                @endforeach
                            </x-select>

                            <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                        </div>

                        <div class="flex mt-4">
                            <x-primary-button>
                                {{ __('Save Task') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>