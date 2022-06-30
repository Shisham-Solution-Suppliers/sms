<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Copy Contacts') }}
        </h2>
        <x-jet-nav-link href="{{ route('message.create') }}">
            {{ __('Back') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Copy Contacts.</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Click the button below to copy all contacts.</p>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <textarea name="phone_numbers" id="phone_numbers" cols="30" rows="10">{{ $phone_numbers }}</textarea>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" value="copy" onclick="copyToClipboard('phone_numbers')">Copy All Contacts!</button>
                            </div>
                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>