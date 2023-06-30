@php
    $routeName = Route::currentRouteName();
    $exemptRoutes = ['dashboard', 'welcome', 'login'];
@endphp

<x-card class="pb-0">

    <div class="flex">

        @if (!in_array($routeName, $exemptRoutes))

            <div class="pr-10">
                <h3 class="text-lg">
                    <a class="text-black-400 px-6 py-2 rounded-xl" href="{{ URL::previous() }}" class="btn btn-primary">

                        <i class="text-3xl fa-sharp fa-solid fa-angle-left"></i>
                        <h5 class=""> Back </h5>
                    </a>
                </h3>
            </div>


            <div class="pr-5">
                <h3 class="text-lg">
                    <a href="/dashboard" class="text-black-400 px-6 py-2 rounded-xl">
                        <i class="fa-sharp fa-solid fa-home fa-beat"></i>

                        <h5 class=""> Dashboard </h5>
                    </a>
                </h3>
            </div>
            @if (Str::startsWith($routeName, 'store'))
                @include('partials._store-layout')
            @elseif (Str::startsWith($routeName, 'sports'))
                @include('partials._sports-layout')
            @endif
        @else
            <h3 class="text-lg">
                <i class="fa-solid fa-circle-exclamation" style="color: #ed333b;"></i>

                <h5 class="pl-2"> Only authorized personnels will be allowed </h5>

            </h3>
        @endif


    </div>
</x-card>
