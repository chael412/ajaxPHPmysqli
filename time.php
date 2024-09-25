<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Date and Time</title>
</head>

<body>
    <div class="datetime">
        <span id="date" class="date"></span> |
        <span id="span" class="datetime time"></span>
    </div>

    <script>
        var span = document.getElementById('span');
        var dateSpan = document.getElementById('date');

        function getCurrentDateTime() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            var ampm = h >= 12 ? 'PM' : 'AM';

            h = h % 12 || 12; // Convert to 12-hour format

            var timeString =
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2) + ' ' + ampm;

            // Format and display the date
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var dateString = d.toLocaleDateString('en-US', options);

            // Create a JavaScript object with the date and time
            var dateTimeObj = {
                date: dateString,
                time: timeString
            };

            return dateTimeObj;
        }

        function updateAndDisplayJSON() {
            var dateTimeObj = getCurrentDateTime();
            var dateTimeJSON = JSON.stringify(dateTimeObj);
            console.log(dateTimeJSON);
        }

        // Call updateAndDisplayJSON() immediately to display and log the current date and time in JSON
        updateAndDisplayJSON();

        // Update the JSON every second
        setInterval(updateAndDisplayJSON, 1000);
    </script>
</body>

</html>