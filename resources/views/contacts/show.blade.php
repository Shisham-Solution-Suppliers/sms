<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Details') }}
        </h2>
        <x-jet-nav-link href="{{ route('contact.index') }}">
            {{ __('Back') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Contact Information.</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">All information below.</p>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                                {{$contact->phone}}
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Operator Name</dt>
                                {{$contact->Operator->name}}
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">List of Messages</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">All messages sent history.</p>
                    </div>
                    
                    @forelse ($contact->Message as $message)
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Date</dt>
                                {{$message->created_at}}
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Message</dt>
                                {{$message->message}}
                            </div>
                        </dl>
                    </div>
                    @empty
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                Sorry! No messages are sent to this number.
                            </div>
                        </dl>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>