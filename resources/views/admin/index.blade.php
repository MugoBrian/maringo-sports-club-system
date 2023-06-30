<x-layout>
    <div class="lg:grid lg:grid-cols-2 gap-10 space-y-10 md:space-y-0 mx-4 mt-5">
        <x-card>
            <div class="justify-center flex flex-col items-center">
                <div>
                    <h3 class="text-2xl">
                        <a href="/members" class="text-black-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-users fa-beat text-laravel"></i>

                            <h3 class="heading-title"> Members</h3>
                        </a>
                    </h3>
                </div>
                <div class="text-sm font-bold text-black-700 mb-4">View, Edit, Delete and Register Members to the Club</div>
            </div>
        </x-card>
        <x-card>
            <div class="justify-center flex flex-col items-center">
                <div>
                    <h3 class="text-2xl">
                        <a href="/store/listofitems/" class="text-black-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-store fa-fade text-laravel"></i>

                            <h3 class="heading-title"> Store</h3>
                        </a>
                        
                    </h3>
                    
                </div>
                <div class="text-sm font-bold text-black-700 mb-4">View, Manage, Restock Orders and Items in the Store</div>
            </div>
        </x-card>
        <x-card>
            <div class="justify-center flex flex-col items-center">
                <div>
                    <h3 class="text-2xl">
                        <a href="/events" class="text-black-400 px-6 py-2 rounded-xl">
                            <i class="fa-regular fa-calendar-days fa-beat text-laravel"></i>

                            <h3 class="heading-title"> Events</h3>
                        </a>
                    </h3>

                </div>
                <div class="text-sm font-bold text-black-700 mb-4">View,Edit, Delete and Register for new Events</div>
            </div>
        </x-card>
        <x-card>
            <div class="justify-center flex flex-col items-center">
                <div>
                    <h3 class="text-2xl">
                        <a href="/sports/activities" class="text-black-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-volleyball-ball fa-bounce text-laravel"></i>

                            <h3 class="heading-title"> Sports</h3>
                        </a>
                    </h3>
                </div>
                <div class="text-sm font-bold text-black-700 mb-4">View, Edit, Delete and different sporting activities in the Club</div>
            </div>
        </x-card>
        <x-card>
            <div class="justify-center flex flex-col items-center">
                <div>
                    <h3 class="text-2xl">
                        <a href="/reports" class="text-black-400 px-6 py-2 rounded-xl">
                            <i class="fa-sharp fa-solid fa-flag fa-flip text-laravel"></i>

                            <h3 class="heading-title"> Reports</h3>
                        </a>
                    </h3>

                </div>
                <div class="text-sm font-bold text-black-700 mb-4">View, Edit, Delete and Reports to the Club</div>
            </div>
        </x-card>
    </div>
</x-layout>
