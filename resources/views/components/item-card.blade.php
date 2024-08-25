<div class="border-2 shadow p-6 rounded-lg">
    <img src="{{ !empty($imagePath) ? $imagePath : 'https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=310&q=80' }}" alt="Destination 1" class="w-full h-48 object-cover rounded-md">
    <div class="flex items-center">
        <h3 class="text-xl font-bold mt-4">{{ $name }}</h3>
        <!-- Rating -->
        <div class="flex items-center gap-1 ml-auto mt-3">
            <span class="text-gray-600">{{ $rating }}</span>
            <span class="text-yellow-500">&#9733;</span>
        </div>
    </div>
    <!-- Truncated Description -->
    <p class="text-gray-600 text-sm mt-2">
        {{ $description }}
        <a href="{{ $urlPath }}" class="text-orange-500 hover:underline">See More</a>
    </p>
</div>
