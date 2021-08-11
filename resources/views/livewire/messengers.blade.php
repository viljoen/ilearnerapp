<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    <x-jet-button wire:click="createShowModal">
                        {{ __('Add ChatRoom') }}
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
                                        <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">RoomId</th>
                                        <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">UserId</th>
                                        <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                        <th class="px-6 py-3 br-gray-50 sm:text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider ">actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @if($data->count())
                                        @foreach($data as $item)
                                            <tr>
                                                <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{$item->room_id}}</td>
                                                <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{$item->user_id}}</td>
                                                <td class="px-6 py-4 text-left text-sm whitespace-no-wrap">{{$item->message}}</td>
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
                                            <td class="px-6 py-4 text-left text-sm whitespace-no-wrap" colspan="4">No Messages Found</td>
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
                        {{ __('User Permission') }} {{$modelId}}
                    </x-slot>

                    <x-slot name="content">
                        <div class="mt-4">
                            <x-jet-label for="role" value="{{ __('Role') }}" />
                            <select id="role" class="block appearance-none w-full bg-gray-100 border" type="text" wire:model="role" placeholder="Role"/>
                            <option value="">-- Select a Role --</option>
                            @foreach(App\Models\User::userRoleList() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                </select>
                                @error('role') <span class="error">{{$message}}</span>@enderror
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="route" value="{{ __('Route') }}" />
                            <select id="route" class="block appearance-none w-full bg-gray-100 border" type="text" wire:model="route" placeholder="Route"/>
                            <option value="">-- Select a Route --</option>
                            @foreach(App\Models\UserPermission::routeNameList() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                </select>
                                @error('route') <span class="error">{{$message}}</span>@enderror
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
                        {{ __('Delete the') }} {{('"')}} {{$room_id}} {{('-')}} {{$message}} {{('"')}} {{(' message (')}}  {{$modelId}} {{(')')}}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete this message? Once your message has been deleted, all of its resources and data will be permanently deleted.') }}

                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('Delete Message') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>

            </div>
        </div>
    </div>
</div>
</div>








