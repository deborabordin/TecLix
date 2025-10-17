@extends('layout.app')
@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin: 20px; padding: 20px;">
                <div class="card-title" style="padding: 20px;">
                    <h5 class="text-center">Criar Nova Campanha</h5>
                </div>
                <div class="card-text">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('campanhas.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" name="imagem" class="form-control">
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" class="form-control">
                            @error('titulo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" class="form-control" rows="4"></textarea>
                            @error('descricao')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="detalhes">Detalhes:</label>
                            <textarea name="detalhes" class="form-control" rows="4"></textarea>
                            @error('detalhes')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="local">Local:</label>
                            <input type="local" name="local" class="form-control">
                            @error('local')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-check form-switch">
                            <input name="ativa" class="form-check-input" type="checkbox" role="switch"
                                id="switchCheckDefault">
                            <label class="form-check-label" for="switchCheckDefault">Ativa</label>
                        </div>

                        <br /><br />






                        <p class="text-center">
                            <a class="btn btn-secondary" href="{{ url('/admin/campanhas') }}">Voltar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
