<div class="max-w-xl mx-auto mt-10">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4 bg-white p-6 rounded shadow" enctype="multipart/form-data">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Prefix Name</label>
            <select wire:model.defer="prefixname" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Select</option>
                <option value="Mr.">Mr</option>
                <option value="Mrs.">Mrs</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">First Name</label>
            <input type="text" wire:model.defer="firstname" class="w-full border border-gray-300 p-2 rounded" required />
            @error('firstname')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Middle Name</label>
            <input type="text" wire:model.defer="middlename" class="w-full border border-gray-300 p-2 rounded" />
            @error('middlename')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Last Name</label>
            <input type="text" wire:model.defer="lastname" class="w-full border border-gray-300 p-2 rounded" required />
            @error('lastname')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Suffix Name</label>
            <input type="text" wire:model.defer="suffixname" class="w-full border border-gray-300 p-2 rounded" />
            @error('suffixname')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Username</label>
            <input type="text" wire:model.defer="username" class="w-full border border-gray-300 p-2 rounded" required />
            @error('username')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" wire:model.defer="email" class="w-full border border-gray-300 p-2 rounded" required />
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Photo</label>
            <input type="file" wire:model="image" accept="image/png, image/jpeg" class="w-full border border-gray-300 p-2 rounded" />
            @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            @if ($image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Live Preview:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="New Photo" class="w-24 h-24 object-cover rounded mt-1 border" />
                </div>
            @elseif ($photoPreview)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Existing Photo:</p>
                    <img src="{{ asset("storage/".$photoPreview) }}" alt="Saved Photo" class="w-24 h-24 object-cover rounded mt-1 border" />
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                Save
            </button>
            <a href="{{ url('/') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 transition">
                Back
            </a>
        </div>
    </form>
</div>
