@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    Test

                    <a class="ms-auto" href="{{ route('admin.infos.create') }}"><i
                            class="fa-solid fa-plus"></i>Aggiungi</a>
                </div>

                <div class="card-body">
                    ciao
                    @foreach ( $infos as $info )
                    <div>
                       Sto prendendo dalla tabella "infos": {{$info->phone}}
                    </div>

                    @endforeach

                    @foreach ( $users as $user )
                    <div>
                      sto prendendo dalla tabella "users": {{$user->name}}
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection