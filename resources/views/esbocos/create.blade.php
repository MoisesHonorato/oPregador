@extends('template')

@section('title', 'Criar Esboço :: O Pregador')

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

                            <div class="col-12">
                                <label class="form-label my-0" for="titulo">Título do esboço</label>
                                <input type="text" class="form-control border border-info px-2" id="titulo"
                                    name="titulo" value="{{ old('titulo') }}">
                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    <label for="livro" class="form-label my-0">Livro</label>
                                    <select class="form-control border border-info px-2" name="livro_id" id="livro">
                                        @foreach ($livros as $livro)
                                            <option value="{{ $livro->id }}">{{ $livro->livro }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label my-0">Capítulo</label>
                                    <input type="number" class="form-control border border-info px-2" name="capitulo"
                                        value="{{ old('capitulo') }}">
                                </div>
                                <div class="col-4">
                                    <label class="form-label my-0" for="versiculo">Versículo</label>
                                    <input type="text" class="form-control border border-info px-2" name="versiculo"
                                        value="{{ old('versiculo') }}">
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <label for="categoria" class="form-label my-0">Categoria</label>
                                <select class="form-control border border-info px-2" name="categoria_id" id="categoria">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-12 my-3">
                                <label for="trumbowyg" class="form-label my-0">Mensagem do esboço</label>
                                <textarea class="form-control border border-info px-2" name="texto" id="trumbowyg" rows="5" placeholder="Escreva aqui seu esboço..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info shadow-secondary my-4 mb-2">
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
