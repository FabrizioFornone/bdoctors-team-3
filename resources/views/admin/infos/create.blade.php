@extends('layouts.app')

@section('content')
<div class="container ms_create">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        New Post
                    </div>
                    <!-- <div>
                        <a href="{{ route('admin.infos.index') }}" title="back">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div> -->
                </div>

                <div class="card-body">

                    @foreach ($users as $user)

                    {{-- name --}}
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" disabled class="form-control @error('name') is-invalid @enderror"
                            placeholder={{$user->name }} value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Surname--}}
                    <div class="mb-3">
                        <label>Surname</label>
                        <input type="text" name="surname" disabled
                            class="form-control @error('surname') is-invalid @enderror" placeholder="{{$user->surname}}"
                            value="{{ old('surname') }}" required>
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label>Business Address</label>
                        <input type="text" name="business_address" disabled
                            class="form-control @error('business_address') is-invalid @enderror"
                            placeholder="{{$user->business_address}}" value="{{ old('business_address') }}" required>
                        @error('business_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @endforeach

                    <div class="mb-3"><strong>Select at least one specialization:</strong> </div>
                    <form action="{{ route('admin.infos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($specializations as $specialization)
                        <div class="form-check form-check-inline mb-3">
                            <label class="form-check-label ms-1" for="specialization_{{$specialization->id}}">{{ $specialization->specialization_name }}</label>
                            <input type="checkbox" class="form-check-input" value="{{ $specialization->id }}" id="specialization_{{$specialization->id}}"
                                name="specializations[]">
                            </div>
                        @endforeach
                        
                        @error('specializations')
                            <div class="pb-3 fw-bold text-danger">{{ $message }}</div>
                        @enderror

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

                        {{-- City --}}
                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" name="city"
                                class="form-control @error('city') is-invalid @enderror"
                                placeholder="Enter your city" value="{{ old('city') }}" required>
                            @error('city')
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
                                class="form-control @error('performances') is-invalid @enderror"
                                placeholder="{{$user->performances}}" value="{{ old('performances') }}" required>
                            @error('performances')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection