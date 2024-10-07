<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $skill->name) }}">
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <div  class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
        <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
        @error('image')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="level">Level</label>
        <input type="text" name="level" value="{{ old('level', $skill->level) }}">
        @error('level')
            {{ $message }}
        @enderror
    </div>
    <button>Enregistrer</button>
    @csrf
</form>