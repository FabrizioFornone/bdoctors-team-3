@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                
                    <div>
                        New Post
                    </div>
                    <div>
                        {{-- <a href="{{ route('admin.posts.index') }}" title="back">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a> --}}
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($users as $user)
                    {{-- name --}}
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                        placeholder="{{ $user->name }}" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Surname--}}
                    <div class="mb-3">
                        <label>Surname</label>
                        <input type="text" name="surname"
                            class="form-control @error('surname') is-invalid @enderror" placeholder="{{ $user->surname }}"
                            value="{{ old('surname') }}" required>
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label>Address P.IVA</label>
                        <input type="text" name="address"
                            class="form-control @error('address') is-invalid @enderror" placeholder="{{ $user->address }}"
                            value="{{ old('address') }}" required>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @endforeach

                    <form action="{{ route('admin.infos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- CV--}}
                        <div class="mb-3">
                            <label>Curriculum Vitae</label>
                            <input type="file" name="CV" class="form-control @error('CV') is-invalid @enderror"
                                placeholder="Enter your CV" value="{{ old('CV') }}" required>
                            @error('CV')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter your address" value="{{ old('address') }}" required>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phone Number --}}
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Performances --}}
                        <div class="mb-3">
                        <label>Performances</label>
                        <input type="text" name="performances"
                            class="form-control @error('performances') is-invalid @enderror" placeholder="{{$user->performances}}"
                            value="{{ old('performances') }}" required>
                        @error('performances')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Save infos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection