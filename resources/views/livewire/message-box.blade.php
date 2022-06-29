<div>
    <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Message {{$charCount}}/160</dt>
            <textarea
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                name="message" id="message" rows="13" wire:model="message" value="{{ old('message')}}"></textarea>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Operator</dt>
            <select
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                id="operator" wire:model="operator">
                <option>---Ncell/NTC/SmartCell---</option>
                @foreach ($operators as $operator)
                <option value="{{$operator->id}}">{{$operator->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Batch Size</dt>
            <input
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                type="number" wire:model="batch_numnber">
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Batch</dt>
            <select
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                type="number" wire:model="batch">
                <option>---Select an Batch---</option>
                @for ($i = 1; $i < $batches; $i++) <option value="{{ $i }}">Batch {{ $i }}</option>
                    @endfor
            </select>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Contact Numbers</dt>
            <select
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                type="number" name="phone[]" id="phoneNumbers" wire:model="phoneNumbers" multiple>
                @forelse ($contacts as $contact)
                @if ($loop->index >= $from && $loop->index < $to) <option value="{{$contact->id}}">{{$contact->phone}}
                    </option>
                    @endif
                    @empty
                    @endforelse
            </select>
        </div>
    </dl>
</div>