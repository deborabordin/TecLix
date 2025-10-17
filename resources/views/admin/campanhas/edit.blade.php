@extends('layout.app')
@section('conteudo')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin: 20px; padding: 20px;">
                <div class="card-title" style="padding: 20px;">
                    <h5 class="text-center">Editar Nova Campanha</h5>
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

                    <form action="{{ route('campanhas.update', $campanha->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($campanha->imagem)
                            <div class="mb-3">
                                <label class="form-label">Imagem Atual:</label><br>
                                <img src="{{ asset('storage/' . $campanha->imagem) }}" alt="" width="200">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" name="imagem" class="form-control">
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" class="form-control"
                                value="{{ old('titulo', $campanha->titulo ?? '') }}">
                            @error('titulo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" class="form-control" rows="4">{{ $campanha->descricao }}
                            </textarea>
                            @error('descricao')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="detalhes">Detalhes:</label>
                            <textarea name="detalhes" class="form-control" rows="4">{{ $campanha->detalhes }}</textarea>
                            @error('detalhes')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="local">Local:</label>
                            <input type="local" name="local" class="form-control"
                                value="{{ old('local', $campanha->local ?? '') }}">
                            @error('local')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br />

                        <div class="form-check form-switch">
                            <input name="ativa" class="form-check-input" type="checkbox" role="switch"
                                id="switchCheckDefault" {{ old('ativa', $campanha->ativa ?? false) ? 'checked' : '' }}>
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
