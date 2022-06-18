<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Create a new Message.</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Add information below.</p>
                    </div>

                    <div class="border-t border-gray-200">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('message.store') }}" method="POST">
                            @csrf
                            <livewire:message-box />
                            <div class="px-4 py-3 bg-gray-50 sm:px-6">
                                <a href="#" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="return selectAll('phoneNumbers', true)">Select All Phone Numbers</a>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function selectAll(id, isSelected) {
    
            // alert("id="+id+" selected? "+isSelected);
            var selectObj=document.getElementById(id);
            // alert("obj="+selectObj.type);
            var options=selectObj.options;
            // alert("option length="+options.length);
            for(var i=0; i<options.length; i++) {
            options[i].selected=isSelected;
            }
        }
    </script>
</x-app-layout>