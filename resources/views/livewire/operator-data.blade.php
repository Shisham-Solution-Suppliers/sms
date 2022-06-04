<div>
    <table class="border-collapse mt-4 shadow-sm">
        <thead>
            <tr class="text-sm bg-blue-600 text-white p-4">
                <th class="p-3">S.N.</th>
                <th class="p-3">Code</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $index => $row)
            <tr class="border border-gray-100 align-text-top">
                <td>{{$index + 1}}</td>
                <td>
                    <input wire:model="rows.{{$index}}.code"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                        type="number" name="rows[{{$index}}][code]" id="rows.{{$index}}.code" />
                </td>
                <td>
                    <button class="text-red-600 align-middle p-4 hover:text-red-700"
                        wire:click.prevent="removeRow({{$index}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button wire:click.prevent="addRow"
        class="py-2 border border-gray-200 shadow-sm px-3 w-full text-sm font-medium text-center text-blue-600 bg-white text-gray-700 rounded-lg hover:bg-blue-600 hover:text-white">
        + Add Row
    </button>
</div>