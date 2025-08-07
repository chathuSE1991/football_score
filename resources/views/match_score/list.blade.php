@extends('layouts.app')

@section('content')
<div class="container">
        <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Match </div>

                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                     <th>#</th>
                      <th>NAME</th>
                       <th>TEAM A</th>
                        <th>TEAM B</th>
                         <th>DATE OF MATCH</th>
                         <th>STATUS</th>
                         <th>ACTION</th>
                    </thead>
                    <tbody>
                        @foreach ($getMatch as $match)
                    <tr >
                        <th scope="row">{{ $match->id}}</th>
                        <td>{{ $match->name}}</td>
                        <td>{{ $match->team_a}}</td>
                        <td>{{ $match->team_b}}</td>
                        <td>{{ $match->match_date}}</td>
                        <td>
                            @if($match->status == 1)
                            <span class="badge bg-primary">Active</span>
                           @else
                           <span class="badge bg-danger">Inactive</span>
                           @endif
                           <br>
                    @if($match->is_live == 0)
    <span class="badge bg-warning text-dark">Upcoming Match</span>
@elseif($match->is_live == 1)
    <span class="badge bg-success">Live Match</span>
@else
    <span class="badge bg-danger">Match Ended</span>
@endif

                        </td>
                         <td>
                              @if($match->is_live == 0)

                            <button type="button" class="btn btn-success btn-sm" onclick="startMatch({{$match->id}})"> Start Match</button>
                            @elseif($match->is_live == 1)
                            <a href="{{ route('match_score.show', ['id' => $match->id]) }}" class="btn btn-primary btn-sm">Add Score</a>

                        @endif
                        </td>
                    </tr>
                  @endforeach
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function startMatch(id) {
        try {
            const url = `{{ url('matches/start') }}/${id}`;

            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (response.ok) {
                window.location.href = "{{ url('matches/score/list') }}";
            } else {
                alert('Failed to start match');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while starting the match.');
        }
    }
</script>


@endsection
