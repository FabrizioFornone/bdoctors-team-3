@extends('layouts.app')

@section('content')
    <div class="container ms_review">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">Reviews List</div>
                    @foreach ($reviews as $review)
                    <div class="card mx-2 my-2">
                        <div class="card-body bg-message">
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-calendar fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Date:</strong>
                                    <br />   
                                    {{ $review->created_at }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                <i class="fa-solid fa-user fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Full Name:</strong>
                                    <br />   
                                    {{ $review->full_name }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-envelope fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Email:</strong>
                                    <br /> 
                                    {{ $review->email }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-file-pen fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Review Text:</strong>
                                    <br />
                                    {{ $review->text }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-star fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Vote:</strong>
                                    <br /> 
                                    {{ $review->vote }}/5
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection