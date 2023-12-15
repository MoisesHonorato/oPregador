@extends('template')

@section('title', 'Esboço :: O Pregador')

@section('conteudo')

    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-success  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h4 class="mb-1">{{ $esboco->titulo }}</h4>
                    <p><strong>Texto-chave:</strong> {{ $esboco->livro->livro }} {{ $esboco->capitulo }}.{{ $esboco->versiculo }}</p>
                    <p class="text-xs text-secondary mb-0 text-sm text-uppercase">
                        {{-- <i class="fa fa-object-group" aria-hidden="true"></i> --}}
                        <strong class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                            categoria: </strong>
                        {{ $esboco->categoria->categoria }}
                    </p>
                    <p class="text-xs text-secondary mb-0 text-sm text-uppercase">
                        {{-- <i class="fa fa-calendar" aria-hidden="true"></i> --}}
                        <small class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                            criado em: </small>
                        {{ $esboco->created_at->format('d/m/Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <p class="text-justify">{!! $esboco->texto !!}</p>
        </div>
    </div>

@endsection()
