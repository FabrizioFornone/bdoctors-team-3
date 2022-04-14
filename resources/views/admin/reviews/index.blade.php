@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        Reviews List

                        {{-- <a class="ms-auto" href="{{ route('admin.infos.create') }}"><i class="fa-solid fa-plus"></i>Aggiungi</a> --}}
                    </div>

                    <div class="card-body">
                        Reviews
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection