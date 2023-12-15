@extends('template')

@section('title', 'Criar Esboço :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-primary mx-3" href="{{ asset('esbocos') }}" type="button">
                <i class="fa fa-list-ol" aria-hidden="true"></i>
                Ver todos
            </a>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Criando esboço</h6>
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

                        <form action="{{ route('esbocos.store') }}" method="POST" role="form">
                            @csrf
                            <div class="input-group input-group-outline">
                                <label class="form-label">Título do esboço</label>
                                <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
                            </div>
                            <div class="row my-3">
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label for="livro" class="form-label"></label>
                                        <select class="form-control" name="livro_id" id="livro">
                                            @foreach ($livros as $livro)
                                                <option value="{{ $livro->id }}">{{ $livro->livro }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Capítulo</label>
                                        <input type="number" class="form-control" name="capitulo"
                                            value="{{ old('capitulo') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Versículo</label>
                                        <input type="text" class="form-control" name="versiculo"
                                            value="{{ old('versiculo') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3 mb-4">
                                <label for="exampleFormControlSelect1" class="form-label"></label>
                                <select class="form-control" name="categoria_id" id="exampleFormControlSelect1">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <textarea class="form-control" name="texto" id="trumbowyg" rows="5" placeholder="Escreva aqui seu esboço..."></textarea>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Criar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection()
