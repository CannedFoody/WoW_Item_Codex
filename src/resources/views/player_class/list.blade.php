@extends("layout")

@section("content")
    <h1 style="color: yellow;">{{ $title }}</h1>

    @if (count($items) > 0)
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <th>ID</th>
                <th>Name</th>
                <th>&nbsp;</th>
            </thead>

            <tbody>
                @foreach($items as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name }}</td>
                        <td>
                            <a href="/classes/update/{{ $class->id }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            /
                            <form action="/classes/delete/{{ $class->id }}" method="post" class="deletion-form d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    @else
        <p>No player classes were found...</p>
    @endif

    <a href="/classes/create" class="btn btn-primary">Insert a new Class</a>
@endsection