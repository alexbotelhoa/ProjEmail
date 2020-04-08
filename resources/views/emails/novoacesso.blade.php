<html>
<body>
    <h4>Seja bem vindo(a) {{ $name }}</h4>

    <p>Você acabou de acessar o sistema utilizando o seu email: {{ $email }}</p>

    <p>Data/Hora de acesso: {{ $datahora }}</p>

    <div>
        <img width="10%" height="10%"
            src="{{ $message->embed( public_path() . '/img/laravel.png' ) }}">
    </div>
</body>
</html>