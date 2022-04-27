@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">Reviews List</div>

                    @foreach ($reviews as $review)
                        <div class="card-body">
                            <div>Full Name: {{ $review->full_name }}</div>
                            <div>Email: {{ $review->email }}</div>
                            <div>Review Text: {{ $review->text }}</div>
                            <div>Vote: {{ $review->vote }}</div>
                        </div>
                    @endforeach
        
                </div>
            </div>
        </div>
    </div>
@endsection