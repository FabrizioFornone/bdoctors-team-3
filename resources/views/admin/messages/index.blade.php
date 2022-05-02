@extends('layouts.app')

@section('content')
    <div class="container ms_message">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">Messages List</div>
                    @foreach ($messages as $message)
                    <div class="card mx-2 my-3">
                        <div class="card-body bg-review">
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-calendar fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Date:</strong>
                                    <br />   
                                    {{ $message->created_at }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                <i class="fa-solid fa-user fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Full Name:</strong>
                                    <br />   
                                    {{ $message->full_name }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-envelope fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Email:</strong>
                                    <br /> 
                                    {{ $message->email }}
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <i class="fa-solid fa-message fs-2 icon-size"></i>
                                </div>
                                <div>
                                    <strong>Message:</strong>
                                    <br />
                                    {{ $message->message }}
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