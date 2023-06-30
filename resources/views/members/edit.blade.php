<x-layout>
    <x-card class="p-10 rounded max-w-xl mx-auto mt-10">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update
            </h2>
            <p class="mb-4">Update Member</p>
        </header>

        <form action="/members/{{ $member->id }}/update" method="post">
            @csrf
            @method('put')

            @php
                $fields = [
                    ['name' => 'fullname', 'label' => 'Full Name'],
                    ['name' => 'gender', 'label' => 'Gender'],
                    ['name' => 'nextofkin', 'label' => 'Next Of Kin'],
                    ['name' => 'dob', 'label' => 'Date Of Birth'],
                    ['name' => 'contact', 'label' => 'Contact Details'],
                    ['name' => 'subcounty', 'label' => 'Sub County'],
                    ['name' => 'school', 'label' => 'School/College'],
                    ['name' => 'games', 'label' => 'Games'],
                    ['name' => 'weight', 'label' => 'Weight (kg)'],
                    ['name' => 'height', 'label' => 'Height (cm)'],
                    ['name' => 'specialneeds', 'label' => 'Special Needs'],
                    ['name' => 'enrolledas', 'label' => 'Enrolled As (Individual/ Group)'],
                
                    // Add more fields here
                ];
            @endphp
            <div class="flex flex-wrap mx-2">
                {{-- mb-6 grid grid-cols-2 gap-4 --}}
                @foreach ($fields as $field)
                    <div class="mb-6 w-1/2 px-2">
                        <label for="{{ $field['name'] }}" class="inline-block text-lg mb-2">
                            {{ $field['label'] }}
                        </label>
                        @if ($field['name'] == 'dob')
                            <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                name="{{ $field['name'] }}" value="{{ $member->dob }}" />
                            {{-- GAMES FIELD --}}
                        @elseif ($field['name'] == 'games')
                            <select name="{{ $field['name'] }}[]" class="border border-gray-200 rounded p-2 w-full"
                                multiple>
                                @if (count($games) > 0)
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}"
                                            {{ $member->games->contains($game->id) ? 'selected' : '' }}
                                            name="{{ $game->id }}">
                                            {{ $game->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- ENROLLED AS FIELD --}}
                        @elseif ($field['name'] == 'enrolledas')
                            <select name="{{ $field['name'] }}" class="border border-gray-200 rounded p-2 w-full"
                                required>
                                @if (count($membershiptypes) > 0)
                                    
                                    @foreach ($membershiptypes as $membershiptype)
                                        <option value="{{ $membershiptype->id }}" {{ $member->membership_type_id == $membershiptype->id ? 'selected' : '' }}>{{ $membershiptype->category }}
                                            
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- GENDER FIELD --}}
                        @elseif ($field['name'] == 'gender')
                            <select name="{{ $field['name'] }}" class="border border-gray-200 rounded p-2 w-full">
                                <option value="Male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                            {{-- HEIGHT AND WEIGHT FIELD --}}
                        @elseif ($field['name'] == 'height')
                            <input type="number" min="50" max="300"
                                class="border border-gray-200 rounded p-2 w-full" name="{{ $field['name'] }}"
                                value="{{ $member[$field['name']] }}" />
                        @elseif($field['name'] == 'weight')
                            <input type="number" min="20" max="150"
                                class="border border-gray-200 rounded p-2 w-full" name="{{ $field['name'] }}"
                                value="{{ $member[$field['name']] }}" />
                            {{-- CONTACT FIELD --}}
                        @elseif ($field['name'] == 'contact')
                            <input type="tel" placeholder="+254701223345"
                                class="border border-gray-200 rounded p-2 w-full" name="{{ $field['name'] }}"
                                value="{{ $member[$field['name']] }}" />
                            {{-- OTHER FIELDS --}}
                        @else
                            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                name="{{ $field['name'] }}" value="{{ $member[$field['name']] }}" />
                        @endif

                        @error($field['name'])
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="mb-6 justify-center flex flex-col items-center">
                <button type="submit"
                    class=" w-full bg-laravel justify-center text-white rounded py-2 px-4 hover:bg-black"
                    name="submit">Update
                </button>

            </div>
        </form>
    </x-card>

</x-layout>
