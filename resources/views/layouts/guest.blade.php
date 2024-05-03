<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koffiemachine Verhuur</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans">
    <div class="relative min-h-screen">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('images/-1200-1200.jpg');"></div>
        <div class="relative z-10 bg-black bg-opacity-75 text-white">
                <!-- Navigatiebalk -->
                <nav class="p-4 text-white">
                    <div class="container mx-auto flex items-center w-full">
                        <img src="{{ asset('images/logo6_groot.png') }}" class="w-16 rounded-md drop-shadow-lg">
                        <ul class="flex ml-24 space-x-4 text-xl font-light">
                            <li><a href="{{route('home')}}" class="hover:text-gray-300">Home</a></li>
                            <li><a href="{{route('products.index')}}" class="hover:text-gray-300">Producten</a></li>
                        </ul>
                        @if(\Illuminate\Support\Facades\Auth::user() != null && !\Illuminate\Support\Facades\Auth::user()->hasRole('Customer'))
                            <ul class="flex right-64 space-x-4 text-xl font-light text-white float-right absolute">
                                <li><a href="{{route('dashboard')}}" class="hover:text-gray-300">Dashboard</a></li>
                                <li><a href="{{route('logout')}}" class="hover:text-gray-300">Logout</a></li>
                            </ul>
                        @endif
                    </div>
                </nav>
                

            <!-- Diensten-sectie -->
            <section id="services" class="py-16 relative min-h-screen">
                @yield('content')
            </section>
            <!-- Footer -->
            <footer class="bg-black text-white font-light text-center py-4">
                <p>&copy; 2023 KoffieVerhuur. Alle rechten voorbehouden.</p>
            </footer>
        </div>
    </div>
</body>
</html>

