<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .checkbox {
            border-radius: 10px;
            margin: 5px;
            cursor: pointer;
            text-align: center;
        }
        .checkbox:hover {
            background-color: #ececec;
        }
        main {
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 3px 3px darkgrey;
            border-radius: 10px;
            width: 260px;
            padding: 1rem;
            font-family: sans-serif;
            margin: 1rem;
            background: linear-gradient(300deg, #5ab091, transparent);
            line-height: 1.5;
            color: #5e5e5e;
        }
        .squareWork {
            display: flex;
            flex-direction: column;
            width: 200px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
<main>
    <label><input tabindex="1" class="checkbox" type="checkbox" id="align"> Выравнивание поверхности</label>
    <label><input tabindex="2" class="checkbox" type="checkbox" id="dismantling"> Демонтаж прошлого покрытия</label>
    <label><input tabindex="3" class="checkbox" type="checkbox" id="specialWork"> Особый график</label>

    <div class="squareWork">
        <p>Площадь работы(м2):</p>
        <input tabindex="4" class="checkbox" type="number" id="squareWorkValue" onchange="fromTextToRange()">
        <input tabindex="5" class="checkbox" type="range" id="squareWorkRange" value="100" step="10" min="10" max="1000" oninput="fromRangeToText()">
    </div>

    <label><input tabindex="6" class="checkbox" type="checkbox" id="material"> Учитывать материалы</label>

    <label><input type="text" class="checkbox" id="total" value="0" disabled> руб.</label>

</main>
<script>
    document.getElementById("align").addEventListener("change", calculator);
    document.getElementById("dismantling").addEventListener("change", calculator);
    document.getElementById("specialWork").addEventListener("change", calculator);
    document.getElementById("material").addEventListener("change", calculator);

    function fromRangeToText() {
        document.getElementById("squareWorkValue").value = document.getElementById("squareWorkRange").value;
        calculator();
    }

    function fromTextToRange() {
        document.getElementById("squareWorkRange").value = document.getElementById("squareWorkValue").value;
        calculator();
    }

    function calculator() {
        let total = document.getElementById("total");
        let oneSquare = 400;
        let countSquare = document.getElementById("squareWorkValue");

        if(document.getElementById("align").checked) oneSquare *= 1.3;
        if(document.getElementById("dismantling").checked) oneSquare *= 2;
        if(document.getElementById("specialWork").checked) oneSquare *= 1.1;
        if(document.getElementById("material").checked) oneSquare += 200;

        total.value = Math.round(oneSquare * countSquare.value);
    }
</script>
</body>
</html>