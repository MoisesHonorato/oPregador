@extends('template')

@section('title', 'Criar sugestão :: O Pregador')

@section('conteudo')

    <div class="row">
        <div class="col-12">

            <a class="btn btn-outline-info mx-3" href="{{ asset('suggestions') }}" type="button">
                <i class="fa fa-list-ol" aria-hidden="true"></i>
                Ver todos
            </a>

            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Criando Sugestão</h6>
                    </div>
                </div>

                <div class="card-header mx-3">
                    <div class="card-body px-0 pb-2">

                        <form action="{{ route('suggestions.store') }}" method="POST" role="form"
                            enctype="multipart/form-data" onsubmit="return validarFormulario()">
                            @csrf

                            <div class="col-12">
                                <label class="form-label my-0" for="title">Assunto</label>
                                <input type="text" class="form-control border border-info px-2" name="title"
                                    id="title" value="{{ old('title') }}" placeholder="Assunto">
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label my-0" for="subject">Sugestão</label>
                                <textarea class="form-control border border-info px-2" name="subject" id="subject" rows="5"
                                    placeholder="Escreva aqui sua sugestão..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info my-4 mb-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Sugerir</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validarFormulario() {
            // Verifica se o campo title está vazio
            var title = document.getElementById('title').value.trim();
            // Verifica se o campo subject está vazio
            var subject = document.getElementById('subject').value.trim();

            if (title === '') {
                // Mostra um Toast de erro para o campo title
                mostrarToast('Por favor, escreva o Assunto.');
                // Impede o envio do formulário
                return false;
            }
            if (subject === '') {
                // Mostra um Toast de erro para o campo subject
                mostrarToast('Por favor, escreva sua Sugestão.');
                // Impede o envio do formulário
                return false;
            }
            return true;
        }

        function mostrarToast(mensagem) {
            $('.toast-body').text(mensagem);
            $('.toast').toast('show');
        }
    </script>

    <!-- Toast -->
    <div class="toast align-items-center text-white bg-danger border-0 position-fixed top-2 end-2" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <!-- Mensagem de erro será exibida aqui -->
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

@endsection()
