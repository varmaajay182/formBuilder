<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, greenyellow, dodgerblue);
            /* font-family: "Sansita Swashed", cursive; */
        }

        .center {
            position: relative;
            padding: 50px 50px;
            background: #fff;
            border-radius: 10px;
        }

        .center h1 {
            font-size: 2em;
            border-left: 5px solid dodgerblue;
            padding: 10px;
            color: #000;
            letter-spacing: 5px;
            margin-bottom: 60px;
            font-weight: bold;
            padding-left: 10px;
            font-family: 'Sansita Swashed', sans-serif;
        }

        .center .inputbox {
            position: relative;
            width: 300px;
            height: 50px;
            margin-bottom: 50px;
        }

      

        .center .inputbox {
            /* display: flex; */
        }

        .center .inputbox label{
          margin-left: 0% !important;
        }

        .center .inputbox:last-child {
            margin-bottom: 0;
        }

       

        .center .inputbox [type="button"] {
            width: 50%;
            background: dodgerblue;
            color: #fff;
            border: #fff;
        }

        .center .inputbox:hover [type="button"] {
            background: linear-gradient(45deg, greenyellow, dodgerblue);
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>{{ $formName }}</h1>
        <form action="/{{$formUrl}}" method="post" id="{{$formId}}">
            @csrf
            {{ $formContent }}
        </form>
    </div>
</body>

</html>
