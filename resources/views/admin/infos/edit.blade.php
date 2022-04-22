@extends('layouts.app')

@section('content')
<div class="container ms_edit">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        Edit Profile
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.infos.update', $info->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method("patch")

                        @foreach ($users as $user)

                        {{-- name --}}
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Surname--}}
                        <div class="mb-3">
                            <label>Surname</label>
                            <input type="text" name="surname"
                                class="form-control @error('surname') is-invalid @enderror"
                                value="{{ old('surname', $user->surname) }}" required>
                            @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label>Business Address</label>
                            <input type="text" name="business_address"
                                class="form-control @error('business_address') is-invalid @enderror"
                                value="{{ old('business_address', $user->business_address) }}" required>
                            @error('business_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach

                        {{-- Specializations --}}
                        <div class="mb-3"><strong>Select at least one specialization:</strong> </div>
                        @foreach ($specializations as $specialization)
                        <div class="form-check form-check-inline mb-3">
                            <label class="form-check-label ms-1" for="specialization_{{$specialization->id}}">{{
                                $specialization->name }}</label>
                            <input type="checkbox" class="form-check-input" value="{{ $specialization->id }}"
                                id="specialization_{{$specialization->id}}" name="specializations[]" {{
                                $info->specializations->contains($specialization) ? 'checked' : '' }}>
                        </div>
                        @endforeach

                        @error('specializations')
                            <div class="pb-3 fw-bold ms_error">{{ $message }}</div>
                        @enderror

                        {{-- CV--}}
                        <div class="mb-3">
                            <label>Curriculum Vitae</label>
                            <input type="file" name="cv" class="form-control @error('cv') is-invalid @enderror">
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
                                value="{{ old('address', $info->address) }}" required>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Phone Number --}}
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Enter your phone number" value="{{ old('phone', $info->phone) }}" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Performances --}}
                        <div class="mb-3">
                            <label>Performances</label>
                            <input type="text" name="performances"
                                class="form-control @error('performances') is-invalid @enderror"
                                value="{{ old('performances', $info->performances) }}" required>
                            @error('performances')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection