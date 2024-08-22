<a class="flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-lg focus:outline-none focus:shadow-lg transition" href="{{ $urlPath }}">
    <img class="w-100 h-100 rounded-t-xl object-cover" src="{{ !empty($imagePath) ? $imagePath : 'https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=310&q=80' }}" alt="Card Image">
    <div class="p-4 md:p-5">
      <h3 class="text-lg font-bold text-gray-800 ">
        {{ $name }}
      </h3>
      <p class="mt-1 text-gray-500">
        {{ $description }}
      </p>
    </div>
  </a>
