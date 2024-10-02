<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $categorie->name) }}">
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <button>Enregistrer</button>
    @csrf
</form>