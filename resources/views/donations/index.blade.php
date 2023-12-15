@extends('template')

@section('title', 'Doe com amor :: O Pregador')

@section('conteudo')

    <style>
        /* Estilos de exemplo para a página de doações */

        .donate-container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .btn-donate {
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn-donate:hover {
            background-color: #ff5500;
        }
    </style>

    <div class="donate-container">
        <div class="display-4 text-secondary mb-2">Contribua com nosso projeto</div>
        
        <blockquote class="blockquote text-primary opacity-8 text-justify">
            <p class="ps-2">"Cada um contribua segundo tiver proposto no coração, não com tristeza ou por
                necessidade; porque Deus ama a quem dá com alegria."</p>
        </blockquote>
        <figcaption class="blockquote-footer ps-3 text-secondary opacity-6">
            <small>2 Coríntios 9:7</small>
        </figcaption>

        <p class="mt-4">Caro pregador, este sistema foi criado com amor e dedicação para auxiliar os pregadores da palavra de Deus a
            organizarem suas mensagens de maneira mais eficiente. O objetivo é disponibilizar essa ferramenta de
            forma <strong>gratuita</strong>, pois acreditamos no poder transformador da palavra divina.</p>
        <p>O intuito é lançar novas funcionalidades no decorrer dos dias. No entanto, manter o sistema no ar envolve custos como hospedagem, desenvolvimento e manutenção. Se você se sente
            tocado pelo nosso trabalho e deseja apoiar, qualquer contribuição, por menor que seja, fará uma diferença enorme
            para nós.</p>
        <p>Para doar, você pode realizar um depósito ou transferência bancária para a conta abaixo:</p>
        <p><strong>Banco: </strong>Nu pagamentos S.A. (Nubank)<br>
            <strong>Agência:</strong> 0001<br>
            <strong>Conta Corrente:</strong> 20717453-1<br>
            <strong>Titular:</strong> Moisés Honorato Amorim
        </p>
        <p>Você também pode fazer uma doação via Pix, utilizando a chave: <strong>69 9 9237 4151</strong></p>
        <img width="300px" src="{{ asset('assets/img/pix.jpeg') }}">
    </div>

@endsection()
