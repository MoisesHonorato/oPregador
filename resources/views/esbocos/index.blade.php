@extends('template')

@section('title', 'Esboço :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">
            <div class="row">

                <div class="row">
                    <div class="col">
                        <a class="btn btn-outline-info mx-3" href="{{ route('esbocos.create') }}" type="button">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar
                        </a>
                    </div>

                    <div class="col">
                        <div class="input-group input-group-outline">
                            <form action="{{ route('esbocos.index') }}" method="GET" class="form-inline my-2 my-lg-0">
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
                            <i class="fa-regular fa-file-lines"></i>
                            Esboços
                            @if ($search)
                                <a class="text-light" href="{{ route('esbocos.index') }}">- Ver todos!</a>
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

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary font-weight-bolder opacity-7">Mensagem
                                    </th>
                                    <th class="text-secondary font-weight-bolder opacity-7">
                                        Categoria</th>
                                    <th class="text-center text-secondary font-weight-bolder opacity-7">
                                        Criação</th>
                                    <th class="text-secondary opacity-7 text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($esbocos as $esboco)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-uppercase text-xs mb-0">{{ $esboco->titulo }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-uppercase text-xs text-secondary mb-0">
                                                {{ $esboco->categoria->categoria }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs text-secondary mb-0">
                                                {{ $esboco->created_at->format('d/m/Y') }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('esbocos.edit', $esboco->id) }}"
                                                class="text-secondary font-weight text-xs opacity-7" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa-regular fa-pen-to-square"></i> Editar
                                            </a> |
                                            <a href="{{ route('esbocos.show', $esboco->id) }}"
                                                class="text-secondary font-weight text-xs opacity-7" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa-regular fa-eye"></i> Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if (count($esbocos) == 0 && $search)
                            <p class="px-4 mt-2">Ops! a palavra
                                <strong class="text-primary">{{ $search }}</strong>
                                não foi encontrada!
                            </p>
                        @elseif(count($esbocos) == 0)
                            <p class="px-4 mt-2">Ainda não foi criado nenhum esboço,
                                <a href="{{ route('esbocos.create') }}">clique aqui</a>
                                para criar!
                            </p>
                        @endif
                        <p>{{ $esbocos->links('custom.pagination') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
