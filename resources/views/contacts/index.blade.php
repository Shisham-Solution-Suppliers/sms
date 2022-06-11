<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
            {{-- Import Export --}}
            <div x-data="{ isModalOpen: false }">
                <div class="inline-flex shadow-sm rounded-md my-4" role="group">
                    <button
                        class="font-semibold text-gray-800 leading-tight"
                        @click="isModalOpen = true">Import
                    </button>
                </div>
    
                <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center z-10">
                    <!-- Modal -->
                    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0  transform translate-y-1/2"
                        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                        role="dialog" id="modal">
                        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                        <header class="flex justify-end">
                            <button
                                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                aria-label="close" @click="isModalOpen = false">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                    <path
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </header>
                        <form action="{{ route('import') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Modal body -->
                            <div class="mt-4 mb-6">
                                <!-- Modal title -->
                                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    Import From Excel
                                </p>
                                <!-- Modal description -->
                                <p class="text-sm text-gray-700 dark:text-gray-400">
                                    <center>
                                        <div class="container mx-auto my-6">
                                            <label for="customFile" x-data="{ files: null }"
                                                class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                                </svg>
                                                <input name="file" wire:model="file" type="file" class="sr-only"
                                                    id="customFile"
                                                    x-on:change="files = Object.values($event.target.files)">
                                                <span
                                                    x-text="files ? files.map(file => file.name).join(', ') : 'SELECT A FILE'"></span>
                                            </label>
                                        </div>
                                    </center>
                                </p>
                            </div>
                            <footer
                                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                <button type="submit"
                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-blue-700 transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Import
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>
                <!-- End of modal backdrop -->
            </div>
            <x-jet-nav-link href="{{ route('contact.create') }}">
                {{ __('Add a new Contact') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    {{-- Errors --}}
                    <div>
                        @if ($errors->any())
                        <div>
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>
                
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <livewire:contact-table/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
