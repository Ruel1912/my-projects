<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animation</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .wrapper:hover .wave {
            transition: 0.3s ease-out;
            background: #27f611;
        }

        .wave {
            display: block;
            width: 20px;
            height: 100px;
            border-radius: 100%;
            background: #acd4f7;
            margin: 0 1px;
            transition: 0.3s ease-in;
            animation: 1s infinite load;
            box-shadow: 6px 0 0 0 #000000d9;

        }

        @keyframes load {
            0% {
                height: 100px;
            }
            50% {
                height: 30px;
            }
            100% {
                height: 100px;
            }
        }

        .wave:nth-child(2){animation-delay: 0.1s;}
        .wave:nth-child(3){animation-delay: 0.2s;}
        .wave:nth-child(4){animation-delay: 0.3s;}
        .wave:nth-child(5){animation-delay: 0.4s;}
        .wave:nth-child(6){animation-delay: 0.5s;}
        .wave:nth-child(7){animation-delay: 0.6s;}
        .wave:nth-child(8){animation-delay: 0.7s;}
        .wave:nth-child(9){animation-delay: 0.8s;}
        .wave:nth-child(10){animation-delay: 0.9s;}
        .wave:nth-child(11){animation-delay: 1.0s;}
        .wave:nth-child(12){animation-delay: 1.1s;}
        .wave:nth-child(13){animation-delay: 1.2s;}
        .wave:nth-child(14){animation-delay: 1.3s;}
        .wave:nth-child(15){animation-delay: 1.4s;}
        .wave:nth-child(16){animation-delay: 1.5s;}
        .wave:nth-child(17){animation-delay: 1.6s;}
        .wave:nth-child(18){animation-delay: 1.7s;}
        .wave:nth-child(19){animation-delay: 1.8s;}
        .wave:nth-child(20){animation-delay: 1.9s;}
        .wave:nth-child(21){animation-delay: 2.0s;}
        .wave:nth-child(22){animation-delay: 2.1s;}
        .wave:nth-child(23){animation-delay: 2.2s;}
        .wave:nth-child(24){animation-delay: 2.3s;}
        .wave:nth-child(25){animation-delay: 2.4s;}
        .wave:nth-child(26){animation-delay: 2.5s;}
        .wave:nth-child(27){animation-delay: 2.6s;}
        .wave:nth-child(28){animation-delay: 2.7s;}
        .wave:nth-child(29){animation-delay: 2.8s;}
        .wave:nth-child(30){animation-delay: 2.9s;}

    </style>
</head>
<body>
<div class="wrapper">
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>

</body>
</html>