<x-layout class="w-full">
    <x-card class="p-10 rounded w-full">
        <header>

            <h1 class="text-3xl text-center mt-0 font-bold my-6 uppercase">
                Manage members
            </h1>
        </header>

        @include('partials._search')
        <div class="mb-4">
            <button class="h-12 w-40 text-white rounded-lg bg-red-500 hover:bg-red-600">
                <a href="/members/register" class="text-white"> Register Member</a>
            </button>
            <div class="mt-3 p-4 bottom-0 relative">
                {{ $members->links() }}
            </div>
        </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto rounded-sm">
                <th>Name</th>
                <th>Gender</th>
                <th>MembershipType</th>
                <th>Age</th>
                <th>Contact</th>
                <tbody>
                    @if ($members->count() > 0)
                        @foreach ($members as $member)
                            <tr class="border-gray-300">
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    
                                        {{ $member->fullname }}
                                </td>
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    
                                        {{ $member->gender }}
                                </td>
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    
                                        {{ $member->membership_type->category }}
                                </td>
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    
                                        {{ $member->dob }} years
                                </td>
                                <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                                    
                                        {{ $member->contact }}
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/members/{{ $member->id }}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form action="/members/{{ $member->id }}/delete" method="POST">
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
                                <p class="text-center">No members Found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </x-card>
</x-layout>
