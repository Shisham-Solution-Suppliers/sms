<div>

    <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Operator</dt>
            <select
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300" id="operator" wire:model="operator">
                <option value="">---Select an Operator---</option>
                @foreach ($operators as $operator)
                <option value="{{$operator->id}}">{{$operator->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Contact Numbers</dt>
            <select
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                type="number" name="phone[]" id="phone" wire:model="phoneNumbers" multiple>
                @forelse ($contacts as $contact)
                <option value="{{$contact->id}}">{{$contact->phone}}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Message {{$charCount}}/160</dt>
            <textarea
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded sm:text-sm border-gray-300"
                name="message" id="message" rows="13" wire:model="message" value="{{ old('message')}}"></textarea>
        </div>
    </dl>
</div>