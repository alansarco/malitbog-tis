<section>
    @section('title')
        <title>Destinations</title>
    @endsection

    <x-navbar />
    <section class="container mx-auto my-10">
        <div class="flex flex-col items-center bg-white p-4 md:p-5 ">
            <input type="text"
                class="py-3 px-5 block w-full md:w-3/4 lg:w-2/4 border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border "
                placeholder="Search Destination" wire:model.live="searchItem">
        </div>

        <div class="flex gap-2 my-3">
        </div>

        <div
            class="grid grid-cols-1 mx-2 md:grid-cols-2 md:mx-4 lg:grid-cols-3 gap-4 justify-between justify-items-start">
            @foreach ($establishments as $establishment)
                <x-item-card name="{{ $establishment->name }}" description="{{ $establishment->description }}"
                    imagePath="{{ $establishment->images->first()?->path }}"
                    urlPath="{{ route('establishment.show', ['establishment' => $establishment]) }}" />
            @endforeach
        </div>
    </section>

</section>
