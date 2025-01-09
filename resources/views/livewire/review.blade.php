<div>
    @forelse ($reviews as $review)
        <div class="text-white rounded">
            <div class="bg-primary d-flex p-2 rounded">
                <div class="d-flex flex-column">
                    <p class="m-0 p-0 text-xs">{{ $review->name }}</p>
                    
                    <span class="text-warning d-flex ">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="text-xs bx @if($i <= $review->rate) bx-star text-xxstext-warning @else bx-star text-secondary @endif"></i>
                        @endfor
                    </span>
                </div>
                <p class="ms-auto text-xxs">{{ $review->created_at->format('Y-m-d') }}</p>
            </div>
            <div class="p-2">
                <p class="overflow-auto font-italic text-primary text-xxs">
                    {{ $review->description }}
                </p>
            </div>
        </div>
    @empty
        No Comments
    @endforelse

    <div class="card shadow rounded p-1 mt-3">
        <div class="card-body d-flex flex-column gap-3">
            <div class="d-flex flex-column">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" wire:model='name'>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Star Rating Input -->
            <div class="d-flex flex-column mb-3">
                <p class="">Rate:</p>
                <div class="d-flex gap-1">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="bx @if($i <= $rate) bx-star text-warning @else bx-star text-dark @endif" 
                           style="cursor: pointer;" 
                           wire:click="$set('rate', {{ $i }})"></i>
                    @endfor
                </div>
                @error('rate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" wire:model='description'></textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary" wire:click="saveReview">Save</button>
        </div>
    </div>
</div>
