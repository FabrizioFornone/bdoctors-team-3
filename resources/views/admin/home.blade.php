@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <a href="{{ route('admin.infos.create') }}">Create CRUD</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection