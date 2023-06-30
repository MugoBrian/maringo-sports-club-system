<x-store>
    <x-card class="p-10 rounded max-w-xl mx-auto mt-10">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update
            </h2>
            <p class="mb-4">Update Sporting Item</p>
        </header>

        <form action="/store/listofitems/{{ $sportingitem->id }}/update" method="post">
            @csrf
            @method('put')

            <div class="flex flex-wrap mx-2 justify-center items-center">
                <div class="mb-6 ">
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="{{ $sportingitem->name }}" placeholder="Name" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 ">
                    <input type="number" min="100" class="border border-gray-200 rounded p-2 w-full" name="amount"
                        value="{{ $sportingitem->amount }}" placeholder="Amount" />
                    @error('amount')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mb-6 justify-center flex flex-col items-center">
                <button type="submit"
                    class="bg-laravel justify-center text-white rounded py-2 px-4 hover:bg-black"
                    name="submit">Update
                </button>

            </div>
        </form>
    </x-card>

</x-store>
