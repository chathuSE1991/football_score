@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Match') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('match.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Event Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="row mb-3">
                            <label for="team_a" class="col-md-4 col-form-label text-md-end">{{ __('Team A Name') }}</label>

                            <div class="col-md-6">
                                <input id="team_a" type="text" class="form-control @error('team_a') is-invalid @enderror" name="team_a" value="{{ old('team_a') }}" required autocomplete="team_a" autofocus>

                                @error('team_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <div class="row mb-3">
                            <label for="team_b" class="col-md-4 col-form-label text-md-end">{{ __('Team B Name') }}</label>

                            <div class="col-md-6">
                                <input id="team_b" type="text" class="form-control @error('team_b') is-invalid @enderror" name="team_b" value="{{ old('team_b') }}" required autocomplete="team_b" autofocus>

                                @error('team_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 <div class="row mb-3">
                            <label for="match_date" class="col-md-4 col-form-label text-md-end">{{ __('Match Date') }}</label>

                            <div class="col-md-6">
                                <input id="match_date" type="date" class="form-control @error('match_date') is-invalid @enderror" name="match_date" value="{{ old('match_date') }}" required autocomplete="match_date" autofocus>

                                @error('match_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
 <div class="checkbox col-md-6">
     <input type="hidden" name="status" value="0">
      <input type="checkbox" name="status"  value="1">

 </div>
                         </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
