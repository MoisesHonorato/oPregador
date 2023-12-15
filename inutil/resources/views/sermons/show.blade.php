@extends('template')

@section('title', 'Pregação :: O Pregador')

@section('conteudo')

    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-info opacity-0"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h4 class=""> Tema: {{ $sermon->esboco->titulo }}</h4>
                    <small>
                        <p class="mb-0">
                            <strong>Texto-chave:</strong>
                            {{ $sermon->esboco->livro->livro }}
                            {{ $sermon->esboco->capitulo }}.{{ $sermon->esboco->versiculo }}
                        </p>
                        <p class="mb-0">
                            <strong>Local e data da pregação:</strong>
                            {{ $sermon->local_sermon }} - {{ date('d/m/Y', strtotime($sermon->data_sermon)) }}
                        </p>
                    </small>
                </div>
            </div>
        </div>
        @if ($sermon->observacao)
            <div class="list-group-item d-flex p-4 mb-2 text-light border-radius-lg bg-dark">
                <div class="d-flex flex-column">
                    <p>
                        <strong class="">Observação:</strong>
                        <em>{{ $sermon->observacao }}</em>
                    </p>
                </div>
            </div>
        @endif
        <div class="row px-3">
            <p class="text-justify">{!! $sermon->esboco->texto !!}</p>
        </div>
    </div>

@endsection()
