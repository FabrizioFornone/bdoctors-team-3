@extends('layouts.app')

@section('content')
    <div class="container ms_message">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">Messages List</div>
                    @foreach ($messages as $message)
                    <div class="card mx-2 my-2">
                        <div class="card-body bg-review">
                            <div>
                                <strong>Date:</strong>
                                <br />  
                                {{ $message->created_at }}
                            </div>
                            <div>
                                <strong>Full Name:</strong>
                                <br />  
                                {{ $message->full_name }}
                            </div>
                            <div>
                                <strong>Email:</strong>
                                <br />
                                {{ $message->email }}
                            </div>
                            <div>
                                <strong>Message:</strong>
                                <br />
                                {{ $message->message }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection