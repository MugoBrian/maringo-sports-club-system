<x-store>
    <x-card class="p-10 rounded max-w-xl mx-auto mt-10">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Add Stock Item</p>
        </header>

        <form action="/store/stockitems/" method="post">
            @csrf
            @method('post')

            <div class="flex flex-wrap mx-2 justify-center items-center">
                <div class="mb-6 ">
                    <select name="sporting_items_id" class="border border-gray-200 rounded p-2 w-full">
                        @foreach ($sportItems as $sportItem)
                            <option value="{{ $sportItem->id }}">{{ $sportItem->name }}</option>
                        @endforeach
                    </select>
                    @error('sporting_items_id')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="pl-5 mb-6">
                    <input type="number" min="1" class="border border-gray-200 rounded p-2 w-full"
                        name="quantity" value="{{ old('quantity') }}" placeholder="Quantity" required />
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mb-6 justify-center flex flex-col items-center">
                <button type="submit"
                    class="w-150 bg-laravel justify-center text-white rounded py-2 px-4 hover:bg-black"
                    name="submit">Save
                </button>

            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-red-500 text-lg mt-1">
                        {{ $error }}
                    </p>
                @endforeach('quantity')

            @endif
        </form>
    </x-card>

</x-store>
