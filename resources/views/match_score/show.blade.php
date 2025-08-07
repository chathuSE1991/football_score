@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Match Score') }}</div>

                <div class="card-body">
            <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $getMatch[0]->team_a }}
        @if($getMatch[0]->matchScores == null)
        <span class="badge bg-primary rounded-pill"> 0 </span>
        @else
        <span class="badge bg-primary rounded-pill">{{ $getMatch[0]->matchScores->team_a_score}}</span>
        @endif
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $getMatch[0]->team_b }}

              @if($getMatch[0]->matchScores == null)
        <span class="badge bg-primary rounded-pill"> 0 </span>
        @else
        <span class="badge bg-primary rounded-pill">{{ $getMatch[0]->matchScores->team_b_score}}</span>
        @endif
    </li>
</ul>

<br/>
<form action="{{ route('match_score.update', $getMatch[0]->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="radio">
        <label>
            <input type="radio" name="team" value="team_a" {{ old('team') == 'team_a' ? 'checked' : '' }}
>
            {{ $getMatch[0]->team_a }}
        </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="team" value="team_b" {{ old('team') == 'team_b' ? 'checked' : '' }}
>
            {{ $getMatch[0]->team_b }}
        </label>
    </div>
  @if ($errors->has('team'))
        <div class="text-danger">
            {{ $errors->first('team') }}
        </div>
    @endif



    <div class="form-group mt-3">
        <label for="action">Score Action</label>
        <select name="action" class="form-control">
            <option value="add">Addition</option>
            <option value="deduct">Deduct</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success mt-3">Save</button>
    <button type="button" onclick="endMatch({{$getMatch[0]->id}})" class="btn btn-danger mt-3">End</button>

<div class="text-end">
    <a type="button" href="/matches/score/list" class="btn btn-default">Back</a>
</div>



</form>
</div>
                </div>
            </div>
        </div>
<br>
            <div id="flash-message"
>
        @if ( isset($success) )
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
    </div>
    </div>
</div>

<script>
      setTimeout(function () {
        const flash = document.getElementById('flash-message');
        if (flash) {
            flash.style.transition = 'opacity 0.5s ease';
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 500); // remove after fade
        }
    }, 2000); // 2 seconds

// end match
    async function endMatch(id) {

        try {
            const url = `{{ url('matches/end/') }}/${id}`;

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
                alert('Failed to end match');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while starting the match.');
        }
    }
</script>
@endsection
