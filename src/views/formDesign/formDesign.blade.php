<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 27%;
            /* Adjust the width as needed */
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        label b{
            font-size:20px
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            /* Adjust the margin as needed */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .inputbox{
           margin-top:10px
        }

        input[type="checkbox"],
        input[type="radio"] {
            margin-bottom: 5px;
            /* Adjust the margin as needed */
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>


    <form action="/{{ $formUrl }}" method="post" id="{{ $formId }}">

        <header>
            <h1>{{ $formName }}</h1>
        </header>

        {{ $formContent }}
    </form>

</body>

</html>
