<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da PokeApi</title>
</head>
<body>
    @foreach ($resposta as $id)

        <li>{{$resposta ['name']}}</li>

        <li>{{$resposta ['height']}}</li>

    @endforeach
</body>
</html>
