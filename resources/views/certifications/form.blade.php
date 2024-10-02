<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $certification->name) }}">
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="year">Années</label>
        <input type="text" name="year" value="{{ old('year', $certification->year) }}">
        @error('year')
            {{ $message }}
        @enderror
    </div>
    <button>Enregistrer</button>
    @csrf
</form>