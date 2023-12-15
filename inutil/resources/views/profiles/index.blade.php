@extends('template')

@section('title', 'Perfil :: O Pregador')

@section('conteudo')

    @auth

        <div class="row">
            <div class="col-12">

                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary bg-dark shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                <i class="fa-regular fa-address-card"></i>
                                Meu perfil
                            </h6>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive px-0 pb-2">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible text-whith mx-3" role="alert">
                                    <span aria-hidden="true" class="text-sm text-white">
                                        {{ session('success') }}
                                    </span>

                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif

                            <ul class="list-group mx-3 z-index-2">
                                <li class="list-group-item border-0 d-flex px-3 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <p>
                                            <strong class="">{{ $user->name }}</strong>
                                        </p>
                                        <span class="mb-2 text-xs">Email: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ $user->email }}</span></span>
                                        <span class="mb-2 text-xs">Telefone:
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                {{ $user->ddd . ' ' . $user->telefone }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="{{ route('profiles.edit', $user->id) }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            Editar
                                        </a>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection()
