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
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <link href="css/app.css" rel="stylesheet">
    <!-- Flaticon Font -->
    @vite('resources/css/app.css')

    {{-- <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                laravel: "#ef3b2d",
                            },
                        },
                    },
                };
            </script> --}}
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
                        Welcome {{ auth()->user()->username }}
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
    <div class="flex flex-col">
        <main class="flex-grow">
            <div class="mt-3 w-full">
                <!-- Hero -->
                <section
                    class="mt-50 h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">

                    <div class="z-10">
                        <h1 class="text-6xl font-bold uppercase text-white">
                            Maringo <span class="text-black">Sports</span> Club
                        </h1>
                        <p class="text-2xl text-gray-200 font-bold my-4">
                            An Exclusive sports membership
                        </p>
                        <div>
                            <a href="/user/login"
                                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Login
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- Footer Start -->
        <div class="footer fixed bottom-0 w-full bg-gray-200 py-4 mt-10">
            <div class="pb-0">
                <h4 class="text-primary mb-4">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>

                </div>
            </div>
            <div class="border-top border-dark pt-5">
                <p class="m-0 text-center text-laravel">
                    &copy; <a class="text-laravel font-weight-bold" href="#">Maringo Sports Club System</a>.
                    All
                    Rights Reserved.
                    Designed by
                    <a class="text-black font-weight-bold" href="#">Konsyda Designs</a>
                </p>
            </div>
            <!-- Footer End -->
        </div>
    </div>


    <x-flash-message />
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
</body>

</html>
