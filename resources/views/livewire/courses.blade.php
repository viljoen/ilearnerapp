<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            <span @popper(Add a Course)><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></span>
        </x-jet-button>
    </div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    {{-- Data Display --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">name</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">url slug</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">description</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider ">actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($data->count())
                            @foreach($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{$item->name}}</td>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">
                                        <a class="text-indigo-600 hover:text-indigo-900" target="_blank" href="{{URL::to('/'.$item->slug)}}">
                                            {{$item->slug}}
                                        </a></td>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{!! $item->description !!}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <a href="/courses/{{$item->id}}"><x-jet-button>
                                            <span @popper(View the Course)><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg></span>
                                        </x-jet-button></a>

                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            <span @popper(Update a Course)><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg></span>
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            <span @popper(Remove a Course)><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg></span>
                                        </x-jet-danger-button>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-left text-sm whitespace-no-wrap" colspan="4">No Courses Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    {{$data->links()}}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Create Course') }} {{$modelId}}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="email" wire:model.debounce.800ms="name" placeholder="Course Name"/>
                @error('name') <span class="error">{{$message}}</span>@enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="slug" value="{{ __('Slug') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-grey-300 bg-grey-50 text-gray-500 text-sm">
                            http://localhost:8000/
                        </span>
                    <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug" />

                </div>
                @error('slug') <span class="error">{{$message}}</span>@enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content" wire:ignore>
                            <trix-editor

                                class="trix-content"
                                x-ref="trix"
                                wire:model.debounce.100000ms="description"
                                wire:key="trix-content-unique-key">
                            </trix-editor>
                        </div>

                    </div>
                </div>
                @error('description') <span class="error">{{$message}}</span>@enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
            @if($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete the') }} {{('"')}} {{$name}} {{('"')}} {{(' course (')}}  {{$modelId}} {{(')')}}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this course? Once your course has been deleted, all of its resources and data will be permanently deleted.') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Course') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>






