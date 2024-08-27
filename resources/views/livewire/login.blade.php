<div class="bg-white border border-gray-200 p-7 rounded-lg shadow-sm">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    <form wire:submit.prevent="submit" class="columns-1">
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium">Email or Username</label>
            <input type="text" id="username" wire:model="username" class="w-full border border-gray-300 p-2 rounded" />
            @error('username')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" wire:model="password"
                class="w-full border border-gray-300 p-2 rounded" />
            @error('password')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Login</button>
    </form>
</div>
