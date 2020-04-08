<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }
        table, thead, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <td>ID</td>
            <td>Nome</td>
            <td>Categorias</td>
        </thead>

        @foreach($produtos as $p)
        <tbody>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>
                <ul>
                    @foreach($p->categorias as $c)
                    <li>{{ $c->nome }}</li>
                    @endforeach
                </ul>
            </td>
        </tbody>
        @endforeach

    </table>
</body>
</html>