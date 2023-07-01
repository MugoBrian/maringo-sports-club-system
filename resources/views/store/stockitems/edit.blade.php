<x-store>
    <x-card class="p-10 rounded max-w-xl mx-auto mt-10">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update
            </h2>
            <p class="mb-4">Update Sporting Item</p>
        </header>

        <form action="/store/stockitems/{{ $stockitem->id }}/update" method="post">
            @csrf
            @method('put')

            <div class="flex flex-wrap mx-2 justify-center items-center">
                <input type="hidden" name="sporting_items_id" value="{{ $stockitem->id }}" />
                <div class="pl-5 mb-6">
                    <label class="border border-gray-200 rounded p-2 w-full">You are editing the stock for:
                        {{ $stockitem->sporting_item->name }} Item</label>
                </div>
                <div class="pl-5 mb-6">
                    <input type="number" min="1" class="border border-gray-200 rounded p-2 w-full"
                        name="quantity" value="{{ $stockitem->quantity }}" placeholder="Quantity" required />
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
                    name="submit">Update
                </button>

            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-red-500 text-xs mt-1">
                        {{ $error }}
                    </p>
                @endforeach('quantity')

            @endif
        </form>
    </x-card>
</x-store>
