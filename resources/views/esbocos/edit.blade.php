@extends('template')

@section('title', 'Editar Esboço :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-info mx-3" href="{{ asset('esbocos') }}" type="button">
                <i class="fa fa-list-ol" aria-hidden="true"></i>
                Ver todos
            </a>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Editando esboço
                        </h6>
                    </div>
                </div>

                <div class="card-header mx-3">
                    <div class="card-body px-0 pb-2">

                        @error('titulo')
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm text-white">{{ $message }}</span>
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

                        <form action="{{ route('esbocos.update', $esboco->id) }}" method="POST" role="form">
                            @csrf
                            @method('PUT')
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" name="titulo" value="{{ $esboco->titulo }}">
                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label for="livro" class="form-label"></label>
                                        <select class="form-control" name="livro_id" id="livro">
                                            @foreach ($livros as $livro)
                                                <option value="{{ $livro->id }}"
                                                    @if ($esboco->livro_id == $livro->id) selected @endif>
                                                    {{ $livro->livro }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Capítulo</label>
                                        <input type="number" class="form-control" name="capitulo"
                                            value="{{ $esboco->capitulo }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Versículo</label>
                                        <input type="text" class="form-control" name="versiculo"
                                            value="{{ $esboco->versiculo }}">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-outline my-3 mb-4">
                                <label for="exampleFormControlSelect1" class="form-label"></label>
                                <select class="form-control" name="categoria_id" id="exampleFormControlSelect1">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            @if ($esboco->categoria_id == $categoria->id) selected @endif> {{ $categoria->categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <textarea class="form-control" name="texto" id="trumbowyg" rows="5" placeholder="Escreva aqui seu esboço...">{{ $esboco->texto }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info my-4 mb-2">
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                    Atualizar
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection()
