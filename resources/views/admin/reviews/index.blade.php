@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">Reviews List</div>
                    @foreach ($reviews as $review)
                        <div class="card-body">
                            <div>
                                <strong>Full Name:</strong>
                                <br />   
                                {{ $review->full_name }}
                            </div>
                            <div>
                                <strong>Email:</strong>
                                <br /> 
                                {{ $review->email }}
                            </div>
                            <div>
                                <strong>Review Text:</strong>
                                <br />
                                {{ $review->text }}
                            </div>
                            <div>
                                <strong>Vote:</strong>
                                <br /> 
                                {{ $review->vote }}
                            </div>
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection