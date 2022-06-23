<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    video{
        position: absolute;
        width: 100%;
        height: 100%;
    }
</style>
<body>
    <video src="{{$stream->rtmpURL}}"></video>
</body>
</html>
