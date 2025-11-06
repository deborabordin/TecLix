@extends('layout.app')

@section('conteudo')
<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h1 style="text-align: center; margin-bottom: 30px;">Painel Administrativo</h1>

    <div style="display: flex; flex-direction: column; gap: 15px;">
        <a href="{{ url('admin/comprovantes') }}" style="padding: 15px; background-color: #3490dc; color: white; text-align: center; text-decoration: none; border-radius: 5px;">
            Gerenciar Comprovantes
        </a>

        <a href="{{ url('/produtos') }}" style="padding: 15px; background-color: #38c172; color: white; text-align: center; text-decoration: none; border-radius: 5px;">
            Cadastrar Produtos
        </a>

        <a href="{{ url('/ponto-de-coletas') }}" style="padding: 15px; background-color: #ffed4a; color: #000; text-align: center; text-decoration: none; border-radius: 5px;">
            Cadastrar Pontos de Coleta
        </a>

        <a class="btn btn-warning" href="{{ url('/admin/campanhas') }}" style="padding: 15px;  color: #000; text-align: center; text-decoration: none; border-radius: 5px;">
            Cadastrar Campanha
         </a>
    </div>
</div>
@endsection
