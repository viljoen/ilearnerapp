<div class="p-6">

    <div x-data="{tab: window.location.hash ? window.location.hash : '#courseInfo'}" class="">
        <div class="flex flex-row justify-between">

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#images'">
                                <span @popper(Image file manager)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>Images</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#video'">
                                <span @popper(Video file library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </span>Video</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#audio'">
                                <span @popper(Audio file library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                    </svg>
                                </span>Audio</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#docs'">
                                <span @popper(Document file library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </span>Documents</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#zip'">
                                <span @popper(Zip file library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                </span>Zip</a>
            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#assessments'">
                                <span @popper(Assessments)>
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </span>Assessments</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#swayppt'">
                                <span @popper(Sway & PPT library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </span>SwayPPt</a>

            <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
               href="#" x-on:click.prevent="tab='#trash'">
                                <span @popper(Trash file library)>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </span>Trash</a>



        </div>



        <div x-show="tab == '#images'" x-cloak>
            <div class="p-2">
                <div>
                    <p>Image Library</p>
                </div>
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    <x-jet-button wire:click="createShowModal">
                        {{ __('Add Course') }}
                    </x-jet-button>
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
                                                    <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                        {{ __('Update') }}
                                                    </x-jet-button>
                                                    <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                                        {{ __('Delete') }}
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
        </div>

        <div x-show="tab == '#video'" x-cloak>
            <div class="p-2">
                <p>Video Library</p>
            </div>
        </div>

        <div x-show="tab == '#audio'" x-cloak>
            <div class="p-2">
                <p>Audio Library</p>
            </div>
        </div>

        <div x-show="tab == '#docs'" x-cloak>
            <div class="p-2">
                <p>Documents Library</p>
            </div>
        </div>

        <div x-show="tab == '#zip'" x-cloak>
            <div class="p-2">
                <p>Zip file library</p>
            </div>
        </div>

        <div x-show="tab == '#assessments' " x-cloak>
            <div class="p-2">
                <p>This is the Assessments tab</p>
            </div>
        </div>

        <div x-show="tab == '#swayppt'" x-cloak>
            <div class="p-2">
                <p>Sway PPT library</p>
            </div>
        </div>

        <div x-show="tab == '#trash'" x-cloak>
            <div class="p-2">
                <p>Trash file library</p>
            </div>
        </div>



    </div>






</div>






