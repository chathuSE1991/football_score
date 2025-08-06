@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Match <a href="{{ route('match.create') }}" class="btn btn-primary  float-end" role="button">Add (+)</a></div>

                <div class="card-body">
                  List
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
