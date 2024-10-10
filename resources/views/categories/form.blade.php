<form action="" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
    <div class="mb-5">
        <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="name" value="{{ old('name', $categorie->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Front" required>
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <button class="ml-2 px-6 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm">Enregistrer</button>
    @csrf
</form>