@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">Messages List</div>
                    @foreach ($messages as $message)
                        <div class="card-body">
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
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection