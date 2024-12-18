<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        .question {
            margin-bottom: 20px;
        }

        .question h3 {
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            gap: 5px;
        }

        .option {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .option input[type="radio"] {
            display: none;
        }

        .option label {
            pointer-events: none;
        }

        .option input[type="radio"]:checked + label {
            background-color: #007bff;
            color: white;
            border-color: #0056b3;
        }

        .option label {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h1>Encuesta</h1>

    <div class="question">
        <h3>Pregunta 1: ¿Qué tan satisfecho estás con nuestro servicio?</h3>
        <div class="options">
            <!-- Opción 0 a 10 -->
            <div class="option">
                <input type="radio" id="q1-0" name="q1" value="0">
                <label for="q1-0">0</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-1" name="q1" value="1">
                <label for="q1-1">1</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-2" name="q1" value="2">
                <label for="q1-2">2</label>
            </div>
            <!-- Continua con el resto de valores -->
            <div class="option">
                <input type="radio" id="q1-3" name="q1" value="3">
                <label for="q1-3">3</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-4" name="q1" value="4">
                <label for="q1-4">4</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-5" name="q1" value="5">
                <label for="q1-5">5</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-6" name="q1" value="6">
                <label for="q1-6">6</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-7" name="q1" value="7">
                <label for="q1-7">7</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-8" name="q1" value="8">
                <label for="q1-8">8</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-9" name="q1" value="9">
                <label for="q1-9">9</label>
            </div>
            <div class="option">
                <input type="radio" id="q1-10" name="q1" value="10">
                <label for="q1-10">10</label>
            </div>
        </div>
    </div>

    <!-- Repite el bloque anterior para más preguntas -->

</body>
</html>
