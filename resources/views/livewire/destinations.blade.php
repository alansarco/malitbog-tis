<section>
    @section('title')
        <title>Destinations</title>
    @endsection

    <x-navbar />

    <!-- Filtering and Search Section -->
    <section class="container mx-auto py-8">
        <div class="w-full md:w-3/6 mx-auto mb-4">
            <input type="text"
                class="py-3 px-5 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border text-center"
                placeholder="Enter Destination Name" wire:model.live="searchItem">
        </div>
        <div class="md:flex justify-center items-center ">

            <!-- Filters -->
            <div class="w-full md:w-1/3 flex gap-2">

                <!-- Rating Filter -->
                <select class="w-full p-2 border border-gray-300 rounded-lg" wire:model.live="filterRate">
                    <option value="">Filter by Rating</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars & Up</option>
                    <option value="3">3 Stars & Up</option>
                    <option value="2">2 Stars & Up</option>
                    <option value="1">1 Star & Up</option>
                </select>

                <!-- Category Filter -->
                <select class="w-full p-2 border border-gray-300 rounded-lg" wire:model.live="filterCategory">
                    <option value="">Filter by Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->value }}">{{$category->value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    <!-- Destination List Section -->
    <section class="container mx-auto py-12 p-6 md:p-2">
        <h2 class="text-3xl font-bold text-center mb-8">Explore Our Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($establishments as $establishment)
                <x-item-card name="{{ $establishment->name }}" description="{{ $establishment->description }}"
                    imagePath="{{ $establishment->images->first()?->path }}"
                    urlPath="{{ route('establishment.show', ['establishment' => $establishment]) }}"
                    rating="{{ $establishment->getAverageRate() }}" />
            @endforeach

        </div>
    </section>
</section>
