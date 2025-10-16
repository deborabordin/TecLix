@extends('layout.app')

@section('conteudo')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="padding: 15px; margin-top: 15px;">
                    <div class="card-title">
                        <h5 class="text-center">Editar ponto de coleta</h5>
                    </div>
                    <div class="card-text">


                        <form action="{{ route('ponto-de-coletas.update', $pontoDeColeta) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nome"
                                value="{{ old('nome', $pontoDeColeta->nome ?? '') }}">
                            @error('nome')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>

                            <label for="bairro">Bairro:</label>
                            <input class="form-control" type="text" name="bairro" id="bairro"
                                value="{{ old('bairro', $pontoDeColeta->bairro ?? '') }}">
                            @error('bairro')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>

                            <label for="cidade">Cidade:</label>
                            <input class="form-control" type="text" name="cidade" id="cidade"
                                value="{{ old('cidade', $pontoDeColeta->cidade ?? '') }}">
                            @error('cidade')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>

                            <label for="numero">Número:</label>
                            <input class="form-control" type="text" name="numero" id="numero"
                                value="{{ old('numero', $pontoDeColeta->numero ?? '') }}">
                            @error('numero')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>

                            <label for="rua">Rua:</label>
                            <input class="form-control" type="text" name="rua" id="rua"
                                value="{{ old('rua', $pontoDeColeta->rua ?? '') }}">
                            @error('rua')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>
                            
                            <p class="text-center">
                            <a class="btn btn-secondary" href="{{ route('ponto-de-coletas.index') }}">Voltar</a>
                            <button class="btn btn-success" type="submit">Atualizar</button>    
                        </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
