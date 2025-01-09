<div>
    @forelse ($reviews as $review)
        <div class="text-white rounded">
            <div class="bg-primary d-flex p-2 rounded">
                <div class="d-flex flex-column">
                    <p class="m-0 p-0 text-xs">{{ $review->name }}</p>
                    <span class="text-warning d-flex">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="text-xs bx @if($i <= $review->rate) bx-star text-xxstext-warning @else bx-star text-secondary @endif"></i>
                        @endfor
                    </span>
                </div>
                <p class="ms-auto text-xxs">{{ $review->created_at->format('Y-m-d') }}</p>
            </div>
            <div class="p-2 pb-0">
                <p class="overflow-auto m-0 font-italic text-primary text-xxs">
                    {{ $review->description }}
                </p>
            </div>
        </div>
    @empty
        No Comments
    @endforelse
</div>
