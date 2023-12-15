@extends('template')

@section('title', 'Criar sugestão :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-primary mx-3" href="{{ asset('suggestions') }}" type="button">
                <i class="fa fa-list-ol" aria-hidden="true"></i>
                Ver todos
            </a>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Criando Sugestão</h6>
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

                        <form action="{{ route('suggestions.store') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Assunto</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <textarea class="form-control" name="subject" id="" rows="5"
                                    placeholder="Escreva aqui sua sugestão..."></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Sugerir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
