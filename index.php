<!DOCTYPE html>
<html>

<head>
    <!--<script src="core.js"></script>-->
    <title>Title of the document</title>
    <!-- hide arrows in the form field -->
    <style>
        .input,
        .output {
            margin: 5%;
            background-color: lightgrey;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="input">
        <form>
            <label for="fname">Enter value:</label><br>
            <input id="input_id" type="number" id="fname" name="fname" value="" min=0><br>
            <button onclick="generateExchange(event)">Submit</button>
        </form>
    </div>
    <!-- OUTPUT -->
    <div class="output">
        <p id="data1"></p>
    </div>
    <div class="output">
        <p id="data2"></p>
    </div>
</body>

<script>
    function generateExchange(event) {
        event.preventDefault(); // Prevent default form submission behavior
        //var val = document.getElementById("input_id").value;

        const input = document.getElementById("input_id");
        const inputValue = input.value;

        const myJSON = '{"data": {"CAD": 1.3766101431,"EUR": 0.9393301408,"USD": 1}}'
        const dataJSON = JSON.parse(myJSON);

        counter = 0;
        currency = "";

        for (let i in dataJSON.data) {
            currency += i + ": " + inputValue * dataJSON.data[i] + "<br>";
            if ((inputValue * dataJSON.data[i]) > 1000000) {
                counter++;
            }
        }

        document.getElementById("data1").innerHTML = "Millionaire counter: " + counter;
        document.getElementById("data2").innerHTML = currency;
    }
</script>

</html>