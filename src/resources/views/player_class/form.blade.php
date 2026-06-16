@extends("layout");

@section("content")
    <h1>{{ $title }}</h1>

    @if ($errors -> any())
        <div class="alert alert-danger">Error!</div>
    @endif

    <form method="post" action="{{ $class -> exists ? '/classes/patch/' . $class -> id : '/classes/put'}}" value="{{ old('name', $class->name) }}">
        @csrf

        <div class="mb-3">
            <label for="player_class-name" class="form-label">
                Class
            </label>

            <input type="text" class="form-control @error('name') is-invalid @enderror" id="class-name" name="name">

            @error("name")
                <p class="invalid-feedback" {{ $errors->first("name") }}>
                </p>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">
            {{ $class->exists ? "Edit class" : "Add class" }}
        </button>
    </form>
@endsection