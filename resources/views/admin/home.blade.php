@extends('layouts.app')

@section('content')
<div class="container ms_home">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center fs-3 fw-bold">DASHBOARD</div>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-between ms_card-div mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="bott-mq">
                            <a href="{{ route('admin.infos.index') }}"
                                class="btn btn-primary text-white fw-bold">PROFILE</a>
                            <a href="{{ route('admin.reviews.index') }}"
                                class="btn btn-primary text-white fw-bold">REVIEWS</a>
                            <a href="{{ route('admin.messages.index') }}"
                                class="btn btn-primary text-white fw-bold">MESSAGES</a>
                            <!-- <a class="btn btn-primary text-white fw-bold">ADVERTISING</a> -->
                        </div>
                    </div>
                    <hr />
                    <div class="mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <h3 class="py-2 fw-bold">MESSAGES</h3>
                        @if ($messages !== [])
                        <div class="row d-flex ms_text-box">
                            <div class="col-10 offset-1">
                                @foreach ($messages as $message)
                                <div class="ms_text my-2 py-2">
                                    <div>
                                        <strong>Full Name:</strong>
                                        {{ $message->full_name }}
                                    </div>
                                    <div>
                                        <strong>Email:</strong>
                                        {{ $message->email }}
                                    </div>
                                    <div>
                                        <strong>Message:</strong>
                                        {{ $message->message }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if (count($messages) == 0)
                        <h5 class="text-decoration-underline">
                            No messages yet
                        </h5>
                        @endif
                    </div>
                    <hr />

                    <div class="mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <h3 class="py-2 fw-bold">REVIEWS</h3>
                        @if ($reviews !== [])

                        <div class="row d-flex ms_text-box">
                            <div class="col-10 offset-1">
                                @foreach ($reviews as $review)
                                <div class="ms_text my-2 py-2">
                                    <div>
                                        <strong>Full Name:</strong>
                                        {{ $review->full_name }}
                                    </div>
                                    <div>
                                        <strong>Email:</strong>
                                        {{ $review->email }}
                                    </div>
                                    <div>
                                        <strong>Review Text:</strong>
                                        {{ $review->text }}
                                    </div>
                                    <div>
                                        <strong>Vote:</strong>
                                        {{ $review->vote }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if (count($reviews) == 0)
                        <h5 class="text-decoration-underline">
                            No reviews yet
                        </h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection