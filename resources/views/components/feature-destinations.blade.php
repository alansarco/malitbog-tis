<section class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Featured Destinations</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        @foreach ($establishments as $establishment)
            <x-item-card name="{{ $establishment->name }}" description="{{ $establishment->description }}"
                imagePath="{{ $establishment->images->first()?->path }}"
                urlPath="{{ route('establishment.show', ['establishment' => $establishment]) }}"
                rating="{{ $establishment->getAverageRate() }}" />
        @endforeach
    </div>
</section>
