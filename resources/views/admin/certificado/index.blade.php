<!DOCTYPE html>
<html>
<head>
    <title>Lista de Certificados</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h1>Certificados Gerados</h1>

    @if($certificados->isEmpty())
        <p>Nenhum certificado encontrado.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Campanha</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certificados as $certificado)
                    <tr>
                        <td>{{ $certificado->id }}</td>
                        <td>{{ $certificado->nome }}</td>
                        <td>{{ $certificado->campanha }}</td>
                        <td>{{ $certificado->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
