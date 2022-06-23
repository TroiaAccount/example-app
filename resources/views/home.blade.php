<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    header {
        position: absolute;
        width: 100%;
        height: 50px;
        background-color: #007bff;
        display: flex;
        justify-content: space-between;
    }

    .header_div {
        margin: auto 20px;

    }

    .card {
        top: 60px;
        left: 30px;
        right: 30px;
    }

    .header_a {
        color: white;
    }
</style>

<body>
    <header>
        <div class="header_div">Logo</div>
        <div class="header_div">
            <a class="header_a" href="{{Route('authPage')}}">Auth</a>
            <a class="header_a" href="#">Register</a>
        </div>
    </header>
    <div style="display: flex">
        @foreach ($streams as $stream)
            <a href="{{Route('streamPage', ['stream_id' => $stream->streamId])}}">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ json_decode($stream->metaData)->image ?? null }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stream->name }}</h5>
                        <p class="card-text">{{ $stream->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Username: {{ $stream->username }}</li>
                    </ul>
                </div>
            </a>
        @endforeach
    </div>
</body>

</html>
