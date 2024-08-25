@extends('layouts/app')

@section('title')
    <title>Help Page</title>
@endsection

@section('content')
    <header class="bg-blue-500 text-white p-4">
        <nav class="container mx-auto flex justify-between">
            <div class="text-lg font-bold">Tourist Info</div>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-orange-500">Home</a></li>
                <li><a href="#" class="hover:text-orange-500">Destinations</a></li>
                <li><a href="#" class="hover:text-orange-500">Travel Tips</a></li>
                <li><a href="#" class="hover:text-orange-500">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Santo_Ni%C3%B1o_Catholic_Church_in_Malitbog%2C_Southern_Leyte.jpg"
            alt="Beautiful Landscape" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col gap-2 justify-center items-center">
            <h2 class="text-4xl font-bold text-white">Explore the Beauty</h2>
            <p class="text-lg text-white mt-4">Discover stunning landscapes, rich culture, and unforgettable experiences.</p>
            <a href="#" class="bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-yellow-500 font-bold">Explore
                Now</a>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Featured Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Destination 1 -->
            <div class="border-2 border-green-600 p-6 rounded-lg">
                <img src="https://via.placeholder.com/400x300" alt="Destination 1" class="w-full h-48 object-cover rounded-md">
                <h3 class="text-xl font-bold mt-4">Destination 1</h3>
                <!-- Rating -->
                <div class="flex items-center mt-2">
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-gray-300">&#9733;</span>
                    <span class="text-gray-600 ml-2">(4.0)</span>
                </div>
                <!-- Truncated Description -->
                <p class="text-blue-600 mt-2">
                    This is a brief description of Destination 1, an amazing place to visit with breathtaking landscapes...
                    <a href="#" class="text-orange-500 hover:underline">See More</a>
                </p>
            </div>

            <!-- Destination 2 -->
            <div class="border-2 border-green-600 p-6 rounded-lg">
                <img src="https://via.placeholder.com/400x300" alt="Destination 2" class="w-full h-48 object-cover rounded-md">
                <h3 class="text-xl font-bold mt-4">Destination 2</h3>
                <!-- Rating -->
                <div class="flex items-center mt-2">
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-gray-600 ml-2">(5.0)</span>
                </div>
                <!-- Truncated Description -->
                <p class="text-blue-600 mt-2">
                    This is a brief description of Destination 2,...
                    <a href="#" class="text-orange-500 hover:underline">See More</a>
                </p>
            </div>

            <!-- Destination 3 -->
            <div class="border-2 border-green-600 p-6 rounded-lg">
                <img src="https://via.placeholder.com/400x300" alt="Destination 3" class="w-full h-48 object-cover rounded-md">
                <h3 class="text-xl font-bold mt-4">Destination 3</h3>
                <!-- Rating -->
                <div class="flex items-center mt-2">
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-yellow-500">&#9733;</span>
                    <span class="text-gray-300">&#9733;</span>
                    <span class="text-gray-300">&#9733;</span>
                    <span class="text-gray-600 ml-2">(3.0)</span>
                </div>
                <!-- Truncated Description -->
                <p class="text-blue-600 mt-2">
                    This is a brief description of Destination 3, offering a unique blend of modern and traditional attractions...
                    <a href="#" class="text-orange-500 hover:underline">See More</a>
                </p>
            </div>

        </div>
    </section>

    <!-- Information Sections -->
    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Travel Tips & Guides</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-6">
                <img src="https://via.placeholder.com/100" alt="Tip 1" class="mx-auto mb-4">
                <h3 class="text-xl font-bold">Tip 1</h3>
                <p>Useful travel advice.</p>
            </div>
            <div class="text-center p-6">
                <img src="https://via.placeholder.com/100" alt="Tip 2" class="mx-auto mb-4">
                <h3 class="text-xl font-bold">Tip 2</h3>
                <p>Useful travel advice.</p>
            </div>
            <div class="text-center p-6">
                <img src="https://via.placeholder.com/100" alt="Tip 3" class="mx-auto mb-4">
                <h3 class="text-xl font-bold">Tip 3</h3>
                <p>Useful travel advice.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-yellow-300 text-center p-6">
        <p class="text-blue-600">&copy; 2024 Tourist Information System. All rights reserved.</p>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="#" class="text-gray-800 hover:text-blue-600">Facebook</a>
            <a href="#" class="text-gray-800 hover:text-blue-600">Twitter</a>
            <a href="#" class="text-gray-800 hover:text-blue-600">Instagram</a>
        </div>
    </footer>
@endsection
