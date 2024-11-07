<div>
    <div class="d-flex flex-column justify-content-center mb-3">
        <div class="mb-6">
            <label class="form-label" for="name">Name <small class="text-danger">*</small></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Free Food"
                wire:model="name" value="{{ old('name') }}" />
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-6">
            <label class="form-label" for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                wire:model="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-block">
            <button wire:click="save" type="submit" class="btn btn-primary d-flex gap-1">
                <i class="bx bx-plus"></i>
                Upload
            </button>
        </div>
    </div>

    <livewire:table-refresher tableName='EstablishmentGalleryTable'>
        <livewire:establishment-gallery-table :establishment=$establishment />
    </livewire:table-refresher>
</div>
