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
    <script src="jquery-3.7.1.js"></script>
</head>

<body>
<a href="https://www.exchangerate-api.com">Rates By Exchange Rate API</a>
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
    async function generateExchange(event) {
        event.preventDefault(); // Prevent default form submission behavior

        const input = document.getElementById("input_id");
        const inputValue = input.value;

        try {
            // Fetch exchange rates using AJAX with JSONP
            const endpoint = 'latest';
            const access_key = '13f4fce0630b10ab2385ece3'; // Replace 'API_KEY' with your actual API key
            $.ajax({
                url: 'https://open.er-api.com/v6/' + endpoint + '?access_key=' + access_key,
                dataType: 'json',
                success: function (json) {
                    console.log(json);
                    let counter = 0;
                    let currency = "";

                    // Loop through the exchange rates data
                    for (let i in json.rates) {
                        currency += i + ": " + inputValue * json.rates[i] + "<br>";
                        if ((inputValue * json.rates[i]) > 1000000) {
                            counter++;
                        }
                    }

                    document.getElementById("data1").innerHTML = "You are a millionaire in " + counter + " countries";
                    document.getElementById("data2").innerHTML = currency;
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request error:", error);
                    // Handle error gracefully, e.g., display an error message to the user
                }
            });
        } catch (error) {
            console.error(error);
            // Handle error gracefully, e.g., display an error message to the user
        }
    }


</script>

</html>