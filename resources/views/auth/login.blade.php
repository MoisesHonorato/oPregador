<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- <meta charset="utf-8"> -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - oPregador</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
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

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="button">
                                                Login
                                            </button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</body>

</html>