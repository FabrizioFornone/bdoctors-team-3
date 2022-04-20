@extends('layouts.app')

@section('content')
<div class="container">
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

                        <a href="{{ route('admin.infos.index') }}" class="btn btn-primary text-white fw-bold">PERSONAL AREA</a>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary text-white fw-bold">REVIEWS</a>
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary text-white fw-bold">MESSAGES</a>
                        <a class="btn btn-primary text-white fw-bold">ADVERTISING</a>

                    </div>
                    
                    <hr/>
                       
                    <div class="mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <h3 class="py-2 fw-bold">MESSAGES</h3>

                        <div class="row d-flex ms_text-box">
                            <div class="col-10 offset-1">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, necessitatibus optio illo repellat est odio quia accusantium voluptatibus eos blanditiis explicabo ratione maxime eius dolorum reiciendis facere sint incidunt possimus!</div>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic voluptate quasi quis vero iure quos? Veritatis ullam ipsam pariatur obcaecati reprehenderit expedita odio quod ducimus, recusandae tempora cumque aliquid dolorem.</div>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius alias qui ipsam accusantium, impedit, ex eum eaque facilis earum natus vitae sint molestiae nihil doloremque sapiente aut libero eveniet adipisci! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate distinctio quos ipsa architecto nisi, quas culpa harum voluptatem modi sint omnis esse a nihil ipsum ab voluptatum nesciunt. Consectetur, natus.</div>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi minima labore magnam nemo cum dolores architecto corporis ut velit autem? Tempora blanditiis ad recusandae placeat, rem culpa rerum iste iusto?</div>
                            </div>
                            <div class="py-3">
                                <a href="{{ route('admin.messages.index') }}" class="btn btn-primary text-white fw-bold">All messages</a>
                            </div>
                        </div>

                    </div>

                    <hr/>
                       
                    <div class="mx-auto">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <h3 class="py-2 fw-bold">REVIEWS</h3>

                        <div class="row d-flex ms_text-box">
                           
                            <div class="col-6">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic voluptate quasi quis vero iure quos? Veritatis ullam ipsam pariatur obcaecati reprehenderit expedita odio quod ducimus, recusandae tempora cumque aliquid dolorem.</div>
                            </div>
                            <div class="col-6">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius alias qui ipsam accusantium, impedit, ex eum eaque facilis earum natus vitae sint molestiae nihil doloremque sapiente aut libero eveniet adipisci! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate distinctio quos ipsa architecto nisi, quas culpa harum voluptatem modi sint omnis esse a nihil ipsum ab voluptatum nesciunt. Consectetur, natus.</div>
                            </div>
                            <div class="col-6">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi minima labore magnam nemo cum dolores architecto corporis ut velit autem? Tempora blanditiis ad recusandae placeat, rem culpa rerum iste iusto?</div>
                            </div>
                            <div class="col-6">
                                <div class="ms_text my-2 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic voluptate quasi quis vero iure quos? Veritatis ullam ipsam pariatur obcaecati reprehenderit expedita odio quod ducimus, recusandae tempora cumque aliquid dolorem.</div>
                            </div>
                            <div class="py-3">
                                <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary text-white fw-bold">All reviews</a>
                            </div>
                            
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection