<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="css/app.css" rel="stylesheet">

    <!-- Tailwind -->
    @vite('resources/css/app.css')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Maringo Sports Club System</title>
</head>

<body class="mb-48 w-full overflow-x-auto">
    <nav class="flex justify-between items-center mb-4">

        <a href="" class="inline">
            <h1 class="text-3xl ml-14 font-weight-bold text-uppercase text-primary">Maringo Sports Club System</h1>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li class="font-weight-bold text-uppercase text-primary">
                    </a>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <form action="/user/logout" method="POST" class="inline">
                        @csrf
                        @method('post')
                        <button type="submit" class="hover:text-laravel"><i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>
                    </form>

                </li>
            @else
                <li>
                    <a href="/members/register" class="hover:text-laravel"><i class="fa-solid fa-user"></i>
                        Register</a>
                </li>
                <li>
                    <a href="/user/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth

        </ul>
    </nav>
    <main>
        @include('partials._nav-layout')
        {{ $slot }}
    </main>
    <x-flash-message />
</body>

</html>
