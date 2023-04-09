<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url('https://projet_fil_rougev2.com/assets/img/ordo.png');
        background-position: left;
        background-repeat: no-repeat;
        background-size: cover;
        /* padding: 0;
        margin: 0;
        box-sizing: border-box;
        height: 100vh;
        width: 100vw; */
    }

    .content{
        position: absolute;

    }

    .name{
        top: 230px;
        left: 180px;
        text-transform: uppercase
    }
    .date{
        top: 200px;
        right: 10px;
    }
    .drugs{
        top: 300px;
        left: 10px;
    }
    .drugs-li{
        margin-bottom:10px;
    }
</style>
<body>
    <div class="content name">{{$patientName}}</div>
    <div class=" content date">{{$created_at}}</div>
    <ul class="content drugs">
        @foreach ($drugs as $drug)

        <li class="drugs-li">{{$drug}}</li>
        @endforeach

    </ul>
</body>
</html>
