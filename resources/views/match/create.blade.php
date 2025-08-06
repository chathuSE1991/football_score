@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Match') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                            <label for="teamA" class="col-md-4 col-form-label text-md-end">{{ __('Team A Name') }}</label>

                            <div class="col-md-6">
                                <input id="teamA" type="text" class="form-control @error('teamA') is-invalid @enderror" name="teamA" value="{{ old('teamA') }}" required autocomplete="teamA" autofocus>

                                @error('teamA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <div class="row mb-3">
                            <label for="teamB" class="col-md-4 col-form-label text-md-end">{{ __('Team B Name') }}</label>

                            <div class="col-md-6">
                                <input id="teamB" type="text" class="form-control @error('teamB') is-invalid @enderror" name="teamB" value="{{ old('teamB') }}" required autocomplete="teamB" autofocus>

                                @error('teamB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 <div class="row mb-3">
                            <label for="matchDate" class="col-md-4 col-form-label text-md-end">{{ __('Match Date') }}</label>

                            <div class="col-md-6">
                                <input id="matchDate" type="date" class="form-control @error('matchDate') is-invalid @enderror" name="matchDate" value="{{ old('matchDate') }}" required autocomplete="matchDate" autofocus>

                                @error('matchDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="matchDate" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
 <div class="checkbox col-md-6">

      <input type="checkbox"> Check me out

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
