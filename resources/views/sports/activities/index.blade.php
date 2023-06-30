<x-store>
    <x-card class="p-10 rounded w-full">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Sport Items
            </h1>
        </header>
        @include('partials._search')
        <div class="mb-4">
            <button class="h-12 w-40 text-white rounded-lg bg-red-500 hover:bg-red-600">
                <a href="/store/listofitems/create" class="text-white"> Add Sport Item </a>
            </button>
            <div class="mt-3 p-4 bottom-0 relative">
                {{ $sportItems->links() }}
            </div>
        </div>
        <div class="overflow-x-auto">

            <table class="w-full table-auto rounded-sm">
                <th>Name</th>
                <th>Amount /Per Item(KSH)</th>

                <tbody>
                    @if ($sportItems->count() > 0)
                        @foreach ($sportItems as $sportItem)
                            <tr class="border-gray-300 ">
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg ">
                                    <a href="/store/listofitems/{{ $sportItem->id }}">
                                        {{ $sportItem->name }}
                                    </a>
                                </td>
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/store/listofitems/{{ $sportItem->id }}">
                                        {{ $sportItem->amount }}
                                    </a>
                                </td>

                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/store/listofitems/{{ $sportItem->id }}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="/store/listofitems/{{ $sportItem->id }}/delete" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td colspan="5"
                                class="px-4 py-8 border-t border-b border-top-width-50 border-gray-300 text-lg">
                                <p class="text-center">No Items Found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
        
    </x-card>
</x-store>
