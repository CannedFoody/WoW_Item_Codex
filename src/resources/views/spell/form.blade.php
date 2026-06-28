@extends ("layout")

@section("content")
    <h2>{{ $title }}</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            Error found, fixes needed...
        </div>
    @endif

    <form method="post" @if($spell->exists) action="/spells/patch/{{ $spell->id }}" @else action="/spells/put" @endif enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="spell-name" class="form-label">Name</label>
            <input type="text" id="spell-name" name="name" value="{{ old('name', $spell->name) }}"
                class="form-control @error('name') is-invalid @enderror">

            @error("name")
                <p class="invalid-feedback">{{ $errors->first("name") }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-class" class="form-label">Class</label>
            <select id="spell-class" name="class_id" class="form-select @error('class_id') is-invalid @enderror">
                <option value="">Choose a class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}"
                            @if ($class->id == old("class_id", $spell->player_class->id ?? false)) selected @endif
                        >{{ $class->name }}</option>
                    @endforeach
            </select>

            @error("class_id")
                <p class="invalid-feedback">{{ $errors->first("class_id") }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-description" class="form-label">Description</label>

            <textarea id="spell_description" name="description" class="form-control @error('description') is-invalid @enderror">
                {{ old("description", $spell->description) }}
            </textarea>

            @error("description")
                <p class="invalid-feedback">{{ $errors->first("description") }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-mana-cost" class="form-label">Mana Cost</label>
            <input type="number" id="spell-mana-cost" name="mana_cost" value="{{ old('mana_cost', $spell->mana_cost) }}"
                class="form-control @error('mana_cost') is-invalid @enderror">
            @error('mana_cost')
                <p class="invalid-feedback">{{ $errors->first('mana_cost') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-cast-time" class="form-label">Cast Time</label>
            <input type="number" step="0.1" id="spell-cast-time" name="cast_time" value="{{ old('cast_time', $spell->cast_time) }}"
                class="form-control @error('cast_time') is-invalid @enderror">
            @error('cast_time')
                <p class="invalid-feedback">{{ $errors->first('cast_time') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" id="spell-global-cd" name="global_cd" value="1"
                    class="form-check-input @error('global_cd') is-invalid @enderror"
                    @if(old('global_cd', $spell->global_cd)) checked @endif>
                <label for="spell-global-cd" class="form-check-label">Global Cooldown</label>
            </div>
            @error('global_cd')
                <p class="invalid-feedback">{{ $errors->first('global_cd') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-cooldown" class="form-label">Cooldown</label>
            <input type="number" min="0.00" step="0.1" id="spell-cooldown" name="cooldown" value="{{ old('cooldown', $spell->cooldown) }}"
                class="form-control @error('cooldown') is-invalid @enderror">
            @error('cooldown')
                <p class="invalid-feedback">{{ $errors->first('cooldown') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spell-school" class="form-label">School</label>
            <input type="text" id="spell-school" name="school" value="{{ old('school', $spell->school) }}"
                class="form-control @error('school') is-invalid @enderror">
            @error('school')
                <p class="invalid-feedback">{{ $errors->first('school') }}</p>
            @enderror
        </div>

        <div class = "mb-3" >
            <label for = "spell-image" class = "form-label" >Image</label>
            @if ( $spell -> image )
                <img
                src= "{{ asset('images/' . $spell -> image ) }}"
                class = "img-fluid img-thumbnail d-block mb-2"
                alt= "{{ $spell -> name }}"
                >
            @endif

            <input
            type= "file" accept= "image/png, image/jpeg, image/webp"
            id= "spell-image"
            name= "image"
            class = "form-control @error('image') is-invalid @enderror"
            >

            @error ( 'image' )
            <p class = "invalid - feedback" >{{ $errors -> first ( 'image' ) }}</p>
            @enderror
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" id="spell-display" name="display" value="1"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if(old('display', $spell->display)) checked @endif>
                <label for="spell-display" class="form-check-label">Display</label>
            </div>
            @error('display')
                <p class="invalid-feedback">{{ $errors->first('display') }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $spell->exists ? "Update" : "Add" }}
        </button>

    
    </form>
@endsection