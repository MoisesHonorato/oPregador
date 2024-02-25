@extends('template')

@section('title', 'Esboço :: O Pregador')

@section('conteudo')

    <button class="btn btn-info" onclick="imprimirParteDaPagina()">Imprimir Esboço</button>
    <button id="botaoCompartilhar" style="display: none;">Compartilhar</button>

    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-success  opacity-6"></span>
    </div>

    <div id="conteudoParaImprimir">
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h4 class="mb-1">{{ $esboco->titulo }}</h4>
                        <p><strong>Texto-chave:</strong> {{ $esboco->livro->livro }}
                            {{ $esboco->capitulo }}.{{ $esboco->versiculo }}</p>
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
    </div>

    <script>
        window.onload = function() {
            // Verifica se o dispositivo é um dispositivo móvel
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

            // Se for um dispositivo móvel, mostra o botão de compartilhamento e adiciona um evento de clique
            if (isMobile) {
                var botaoCompartilhar = document.getElementById('botaoCompartilhar');
                botaoCompartilhar.style.display = 'block';
                botaoCompartilhar.addEventListener('click', function() {
                    // Obtém o conteúdo dentro do elemento com o ID conteudoParaImprimir
                    var conteudoParaCompartilhar = document.getElementById('conteudoParaImprimir').innerHTML;

                    // Compartilha o conteúdo usando a API navigator.share()
                    navigator.share({
                            title: document.title,
                            text: 'Confira este conteúdo interessante!',
                            url: window.location.href,
                            html: conteudoParaCompartilhar
                        })
                        .then(() => console.log('Conteúdo compartilhado com sucesso!'))
                        .catch((error) => console.error('Erro ao compartilhar:', error));
                });
            }
        };
    </script>

@endsection()
