<form action="" method="post" enctype="multipart/form-data"  class="max-w-sm mx-auto">
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" name="title" value="{{ old('title', $production->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Création d'un logo" required>
        @error('title')
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
    <div class="mb-5">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
        <textarea name="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ici la description" required>{{ old('content', $production->content) }}</textarea>
        @error('content')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-5">
        <label for="categorie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
        @foreach ($categories as $categorie)
            <div>
                <input @checked($categoriesIds->contains($categorie->id)) type="checkbox" name="categories[]" value="{{ $categorie->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></input>
                <label for="categories[]" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $categorie->name }}</label>
            </div>
        @endforeach
        @error('categorie')
            {{ $message }}
        @enderror
    </div>
    <button class="ml-2 px-6 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm">Enregistrer</button>
    @csrf
</form>