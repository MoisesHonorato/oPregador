@extends('template')

@section('title', 'Criar sugestão :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-info mx-3" href="{{ asset('profiles') }}" type="button">
                <i class="material-icons opacity-10">arrow_back</i>
                Voltar
            </a>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Editando Perfil</h6>
                    </div>
                </div>

                <div class="card-header mx-3">
                    <div class="card-body px-0 pb-2">

                        @error('titulo')
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ $message }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @enderror

                        @error('texto')
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ $message }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @enderror

                        <form action="{{ route('profiles.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label my-0" for="name">Nome</label>
                                    <input type="text" class="form-control border border-info px-2" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-3 mt-3">
                                    <label for="ddd" class="form-label my-0">DDD</label>
                                    <input id="ddd" type="number" class="form-control border border-info px-2"
                                        name="ddd" value="{{ $user->ddd }}" required autocomplete="ddd" autofocus>
                                </div>

                                <div class="col-md-3 col-9 mt-3">
                                    <label class="form-label my-0">Telefone</label>
                                    <input id="telefone" type="text" class="form-control border border-info px-2"
                                        name="telefone" value="{{ $user->telefone }}" required autocomplete="telefone"
                                        autofocus>
                                </div>
                                <div class="col-md-6 col-12 mt-3">
                                    <label for="email" class="form-label my-0">Email</label>
                                    <input id="email" type="email" class="form-control border border-info px-2 "
                                        name="email" value="{{ $user->email }}" autocomplete="email">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6 col-12">
                                    <label for="password" class="form-label my-0">Senha</label>
                                    <input id="password" type="password" class="form-control border border-info px-2 "
                                        name="password" autocomplete="new-password">
                                </div>
                                <div class="col-md-6 col-12 ">
                                    <label for="password-confirm" class="form-label my-0">Confirme a Senha</label>
                                    <input id="password-confirm" type="password"
                                        class="form-control border border-info px-2" name="password_confirmation"
                                        autocomplete="new-password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info shadow-secondary my-4 mb-2">
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                    Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
