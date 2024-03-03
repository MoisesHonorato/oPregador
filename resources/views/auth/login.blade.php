<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - oPregador</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />


</head>

<body class="" style="background-color: #eee;">

    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">

                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="https://o-pregador.com/assets/img/logo-ct-dark.png" style="width: 15%"
                                            alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">oPregador</h4>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <span aria-hidden="true" class="text-sm">
                                                <small>{{ session('status') }}</small>
                                            </span>

                                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif

                                    @error('redEmail')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <span class="text-sm"><small>{{ $message }}</small></span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @enderror

                                    <form method="POST" action="{{ route('login') }}" class="text-start">
                                        @csrf

                                        <p>Seja bem vindo novamente</p>


                                        <div class="form-outline mb-4">
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                required autocomplete="email" autofocus />
                                            <label class="form-label" for="email">
                                                E-mail
                                            </label>

                                            @error('email')
                                                <span class="invalid-feedback mb-2 small" role="alert">
                                                    <strong class="mb-2 small">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" />
                                            <label class="form-label" for="password">Senha</label>

                                            @error('password')
                                                <span class="invalid-feedback mb-2 small" role="alert">
                                                    <strong class="mb-2 small">{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="text-center pt-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="button">
                                                Login
                                            </button>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 text-center">
                                                <a href="{{ asset('forgot-password') }}" class="text-warning"
                                                    data-bs-toggle="modal" data-bs-target="#redefinirEmail">
                                                    <small>
                                                        Esqueci minha senha
                                                    </small>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Não tem uma conta?</p>
                                            <a href="{{ asset('register') }}" class="btn btn-outline-danger">Criar
                                                conta</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">O seu chamado!</h4>
                                    <p class="mb-3">
                                        "Pregue a palavra, esteja preparado a tempo e fora de tempo, repreenda, corrija,
                                        exorte com toda a paciência e doutrina." 2 Timóteo 4:2
                                    </p>
                                    <p class="mb-0">
                                        É um chamado vital para proclamar a Palavra de Deus com diligência e amor,
                                        orientando outros no caminho da verdade.
                                    </p>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="redefinirEmail" tabindex="-1" aria-labelledby="redefinirEmail"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="redefinirEmail">Redefinir senha</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                                <div>
                                                    <x-input-label for="redEmail" :value="__('Email')" />
                                                    <x-text-input id="redEmail"
                                                        class="block mt-1 w-full form-control" type="email"
                                                        name="email" :value="old('email')" required autofocus />
                                                </div>

                                                <div class="text-center mt-4 mb-2 ">
                                                    <button type="button" class="btn btn-secondary mr-2"
                                                        data-bs-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Redefinir senha
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
