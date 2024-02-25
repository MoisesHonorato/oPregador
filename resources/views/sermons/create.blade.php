@extends('template')

@section('title', 'Criar Pregação :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-info mx-3" href="{{ asset('sermons') }}" type="button">
                <i class="fa fa-list-ol" aria-hidden="true"></i>
                Ver todos
            </a>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Criando Pregação</h6>
                    </div>
                </div>

                <div class="card-header mx-3">
                    <div class="card-body px-0 pb-2">

                        @error('local_sermon')
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

                        <form action="{{ route('sermons.store') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label for="esboco" class="form-label my-0">Esboço <small class="text-info">escolha um esboço clicando no campo abaixo</small></label>
                                <select class="form-control border border-info px-2" name="esboco_id" id="esboco">
                                    @foreach ($esbocos as $esboco)
                                        <option value="{{ $esboco->id }}">{{ $esboco->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-9 mt-3">
                                    <label class="form-label my-0" for="local_sermon">Local da pregação</label>
                                    <input type="text" class="form-control border border-info px-2" id="local_sermon" name="local_sermon"
                                        value="{{ old('local_sermon') }}" placeholder="Ex.: Igreja Jerusalém">
                                </div>
                                <div class="col-12 col-md-3 mt-3">
                                    <label class="form-label my-0" for="data_sermon">Data da pregação</label>
                                    <input type="date" class="form-control border border-info px-2" id="data_sermon" name="data_sermon"
                                        value="{{ old('data_sermon') }}">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <label class="form-label my-0" for="observacao">Observação</label>
                                    <textarea class="form-control border border-info px-2" id="observacao" name="observacao" id="" rows="5"
                                        placeholder="Escreva uma observação..."></textarea>
                                </div>
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
