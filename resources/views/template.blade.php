<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title> @yield('title') </title>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FBEPFBWJZ9"></script>


    <!-- ================= FONTS ====================== -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto" />

    <!-- ================== ICONS ====================== -->

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dist-trumbowyg/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css') }}">

    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    {{-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> --}}
</head>

<body class="g-sidenav-show  bg-gray-200">

    {{-- ============================ Menu ===================== --}}

    <?php
    $user = auth()->user(); // Obter o usuário logado
    $accessLevels = $user->accessLevels;

    $admin = false;
    $pregador = false;

    // Iterar sobre os níveis de acesso
    foreach ($accessLevels as $accessLevel) {
        if ($accessLevel->name == 'admin') {
            $admin = true;
        }
        if ($accessLevel->name == 'pregador') {
            $pregador = true;
        }
        // Se ambos os papéis forem encontrados, não há necessidade de continuar o loop
        if ($admin && $pregador) {
            break;
        }
    }
    ?>

    @include('main.menu')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- ========================= Cabeçalho ================ -->
        @include('main.cabecalho')

        <div class="container-fluid py-4">

            {{-- ====================== Conteudo ================== --}}
            @yield('conteudo')

            {{-- ======================= Rodape ================== --}}
            @include('main.rodape')

        </div>
    </main>

    {{-- ================ Configuração UI ======================== --}}
    @include('main.configuracaoUI')

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    @yield('DashboardCardJS')

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('dist-trumbowyg/trumbowyg.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-trumbowyg/langs/pt_br.min.js') }}"></script>
    <!-- Import Trumbowyg emoji at the end of <body>... -->
    <script src="{{ asset('dist-trumbowyg/plugins/emoji/trumbowyg.emoji.min.js') }}"></script>
    <script src="{{ asset('dist-trumbowyg/plugins/colors/trumbowyg.colors.min.js') }}"></script>

    <script>
        $('#trumbowyg').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['emoji'],
                ['fullscreen']
            ],
            autogrow: true
        });
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FBEPFBWJZ9');
    </script>

    <script>
        function imprimirParteDaPagina() {
            // Obtém o conteúdo que deseja imprimir
            var conteudoParaImprimir = document.getElementById('conteudoParaImprimir').innerHTML;

            // Crie uma nova janela temporária
            var janelaImprimir = window.open('', '', 'height=600,width=800');

            // Crie o conteúdo HTML na nova janela
            var conteudoHTML = `
    ${conteudoParaImprimir}
`;

            // Escreva o conteúdo na nova janela
            janelaImprimir.document.write(conteudoHTML);
            janelaImprimir.document.close();

            // Chame a função de impressão na nova janela
            janelaImprimir.print();
        }
    </script>
</body>

</html>
