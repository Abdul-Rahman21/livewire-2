<div class="p-6">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    <h2 class="text-2xl font-bold mb-4">User List</h2>

    <a href="{{ route('user.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Add User</a>

    <table class="w-full mt-4 border-collapse">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Full Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Photo</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr class="border-t">
                    <td class="p-2 border">{{ $index + 1 }}</td>
                    <td class="p-2 border">{{ $user->prefixname." ".$user->username }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
                    <td class="p-2 border">
                        @if($user->photo)
                            <img src="{{ asset("storage/".$user->photo) }}" class="w-12 h-12 object-cover rounded-full" alt="User Photo">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 underline">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
