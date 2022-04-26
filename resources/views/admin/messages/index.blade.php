@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">Messages List</div>

                    @foreach ($messages as $message)
                        <div class="card-body">
                            <div>Name: {{ $message->full_name }}</div>
                            <div>Email: {{ $message->email }}</div>
                            <div>Message: {{ $message->message }}</div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection