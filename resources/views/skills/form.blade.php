<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $skill->name) }}">
        @error('name')
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