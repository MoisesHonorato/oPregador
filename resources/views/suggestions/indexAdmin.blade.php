@extends('template')

@section('title', 'Pregações :: O Pregador')

@section('conteudo')

    @auth

        <div class="row">
            <div class="col-12">
                <div class="row">

                    <div class="row">
                        <div class="col">
                            <a class="btn btn-outline-info mx-3" href="{{ route('suggestions.create') }}" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i> Sugerir
                            </a>
                        </div>

                        <div class="col">
                            <div class="input-group input-group-outline">
                                <form action="{{ route('suggestions.index') }}" method="GET" class="form-inline my-2 my-lg-0">
                                    <div class="row">
                                        <div class="col-9 p-0">
                                            <div class="input-group input-group-outline">
                                                <label class="form-label">Procurar...</label>
                                                <input type="text" name="search" class="form-control"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-outline-secondary opacity-5" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                <i class="fa-solid fa-people-pulling"></i>
                                Todas Sugestões
                                @if ($search)
                                    <a class="text-light" href="{{ route('suggestions.index') }}">- Ver todos!</a>
                                @endif
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
                                @foreach ($suggestions as $suggestion)
                                    <li class="list-group-item border-0 d-flex px-3 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="col-10 pr-4">
                                            <p>
                                                <strong class="">Assunto:</strong>
                                                <em class="">{{ $suggestion->title }}</em>
                                                <small class="text-xs">-
                                                    Criado em {{ date('d/m/Y', strtotime($suggestion->created_at)) }}
                                                </small>
                                            </p>
                                            <p>
                                                <span class="mb-2 text-xs">Usuário:
                                                    <span class="text-dark font-weight-bold ms-sm-2">Fulano de tal</span>
                                                    | fulano | (76) 9898-0987
                                                </span>
                                            </p>
                                            <span class="mb-2 text-xs">Sugestão:
                                                <span
                                                    class="text-dark font-weight-bold ms-sm-2">{{ $suggestion->subject }}</span>
                                            </span>
                                        </div>

                                        <div class="col-2">
                                            <a class="btn bg-gradient-dark"
                                                href="{{ route('suggestions.edit', $suggestion->id) }}">
                                                <i class="fa-regular fa-pen-to-square"></i> Editar
                                            </a>

                                            <a class="btn btn-link text-primary text-gradient px-3 mb-0"
                                                href="{{ route('suggestions.show', $suggestion->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Ver
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            @if (count($suggestions) == 0 && $search)
                                <p class="px-4 mt-2">Ops! a palavra
                                    <strong class="text-primary">{{ $search }}</strong>
                                    não foi encontrada!
                                </p>
                            @elseif(count($suggestions) == 0)
                                <p class="px-4 mt-2">Você ainda não possue sugestões,
                                    <a href="{{ route('suggestions.create') }}">clique aqui</a>
                                    para criar!
                                </p>
                            @endif
                            <p>{{ $suggestions->links('custom.pagination') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection()
