<div class="p-6">
    {{-- Search Contol filter --}}
        <div class=" w-full flex pb-10">
            <div class="w-full mx-1 px-1 py-3 sm:px-2">
                <span @popper(Search for the course)>
                    <input wire:model.debounce.400ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search courses...">
                </span>
            </div>
        </div>
        {{-- Order, number of Results and create button --}}
        <div class="w-full flex pb-10 justify-end">
            {{-- Order By --}}
            <div class="w-2/6 relative px-1 py-3 mx-1">
                <span @popper(Order Results By)>
                    <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="slug">URL</option>
                    </select>
                </span>
            </div>
            {{-- Ascending Descending Order --}}
            <div class="w-2/6 relative px-1 py-3 mx-1">
                <span @popper(Change Order listing)>
                    <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="1">Ascending</option>
                        <option value="0">Descending</option>
                    </select>
                </span>
            </div>
            {{-- Number of Results filter--}}
            <div class="w-2/6 relative px-1 py-3 mx-1">
                <span @popper(Change number of results)>
                    <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </span>
            </div>
            {{-- Create button --}}
            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                <x-jet-button wire:click="createShowModal">
                <span @popper(Add a Course)><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg></span>
                </x-jet-button>
            </div>
        </div>

        {{-- Create Confirmation --}}
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
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Column 1</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Column 2</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Column 3</th>
                            <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider ">actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($data->count())
                            @foreach($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{'Record1'}}</td>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{'Record2'}}</td>
                                    <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{'Record3'}}</td>
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
    <div class="mt-4">
        {{$data->links()}}
    </div>


    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Create or Update') }} {{$modelId}}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="email" wire:model.debounce.800ms="name" placeholder="Course Name"/>
                @error('name') <span class="error">{{$message}}</span>@enderror
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

    {{-- Delete User Confirmation Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete the') }} {{('"')}} {{$modelId}} {{('"')}} {{(' course (')}}  {{$modelId}} {{(')')}}
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






