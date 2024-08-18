<div class="grid grid-cols-1 mx-2 md:grid-cols-2 md:mx-4 lg:grid-cols-3 gap-4 justify-between justify-items-start">
    @foreach ($establishments as $establishment)
        <x-item-card name="{{ $establishment->name }}" description="{{$establishment->description}}" imagePath="{{ $establishment->images->first()?->path }}" />
    @endforeach
</div>
