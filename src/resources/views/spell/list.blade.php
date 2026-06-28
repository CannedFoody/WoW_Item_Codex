@extends ("layout");

@section("content")

<h1>{{ $title }}</h1>

@if(count($items) > 0)
    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Class</th>
                <th>Name</th>
                <th>Description</th>
                <th>Mana Cost</th>
                <th>Cast time</th>
                <th>Global CD</th>
                <th>Cooldown</th>
                <th>School</th>
                <th>Display</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($items as $spell)

                <tr>
                    <td><img src="/images/{{ $spell->image }}"></td>
                    <td>{{ $spell->id }}</td>
                    <td>{{ $spell->player_class->name }}</td>
                    <td>{{ $spell->name }}</td>
                    <td>{{ $spell->description }}</td>
                    <td>{{ $spell->mana_cost }}</td>

                    @if ($spell->cast_time == null)
                        <td>Instant</td>
                    @else
                        <td>{{ $spell->cast_time }}</td>
                    @endif

                    <td>{{ $spell->global_cd}}</td>
                    <td>{{ $spell->cooldown }}</td>
                    <td>{{ $spell->school }}</td>

                    <td>{!! $spell->display ? "&#x2714;" : "&#x274C;" !!}</td>
                    <td>
                        <a
                            href="/spells/update/{{ $spell->id }}"
                            class="btn btn-outline-primary btn-sm"> Change </a> /
                        <form
                            method="post"
                            action="/spells/delete/{{ $spell->id }}"
                            class="d-inline deletion-form">
                            
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <p>No spells were found....</p>
    @endif

    <a href="spells/create" class="btn btn-primary">Add Spell</a>

@endsection