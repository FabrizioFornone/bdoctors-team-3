@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center fs-3 fw-bold">Dashboard</div>

                <div class="card-body text-center">
                    <div class="d-flex justify-content-between ms_card-div mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <a href="{{ route('admin.infos.index') }}" class="btn btn-primary text-white fw-bold">PERSONAL AREA</a>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary text-white fw-bold">REVIEWS</a>
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary text-white fw-bold">MESSAGES</a>
                        <a class="btn btn-primary text-white fw-bold">ADVERTISING</a>
                       

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection