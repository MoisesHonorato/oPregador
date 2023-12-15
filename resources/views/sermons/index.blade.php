@extends('template')

@section('title', 'Pregações :: O Pregador')

@section('conteudo')

    @auth

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="row">
                        <div class="col">
                            @if (count($esbocos) > 0)
                                <a class="btn btn-outline-info mx-3" href="{{ route('sermons.create') }}" type="button">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Criar
                                </a>
                            @else
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Criar
                                </button>
                            @endif
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ops...</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Olá Pregador! Para continuar, é necessário ter pelo um esboço cadastrado...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                        <a class="btn btn-outline-info mx-3" href="{{ route('esbocos.create') }}"
                                            type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Criar Esboço
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group input-group-outline">
                                <form action="{{ route('sermons.index') }}" method="GET" class="form-inline my-2 my-lg-0">
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
                                <i class="fa-solid fa-user-tie"></i>
                                Pregações
                                @if ($search)
                                    <a class="text-light" href="{{ route('sermons.index') }}">- Ver todos!</a>
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
                                @foreach ($sermons as $sermon)
                                    <li class="list-group-item border-0 d-flex px-3 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <p>
                                                <strong class="">Tema:</strong>
                                                <em class="">{{ $sermon->esboco->titulo }}</em>
                                            </p>
                                            <span class="mb-2 text-xs">Local da Pregação: <span
                                                    class="text-dark font-weight-bold ms-sm-2">{{ $sermon->local_sermon }}</span></span>
                                            <span class="mb-2 text-xs">Data da pregação: <span
                                                    class="text-dark ms-sm-2 font-weight-bold">{{ date('d/m/Y', strtotime($sermon->data_sermon)) }}</span></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('sermons.edit', $sermon->id) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                                Editar
                                            </a>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="{{ route('sermons.show', $sermon->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Ver
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            @if (count($sermons) == 0 && $search)
                                <p class="px-4 mt-2">Ops! a palavra
                                    <strong class="text-info">{{ $search }}</strong>
                                    não foi encontrada!
                                </p>
                            @elseif(count($sermons) == 0)
                                <p class="px-4 mt-2">Ainda não foi criado nenhuma pregação,
                                    <a href="{{ route('sermons.create') }}">clique aqui</a>
                                    para criar!
                                </p>
                            @endif
                            <p>{{ $sermons->links('custom.pagination') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection()
