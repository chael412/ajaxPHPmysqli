<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="datetime">
        <span id="date" class="date"></span> |
        <span id="span" class="datetime time"></span>
    </div>

    <script>
        var span = document.getElementById('span');
        var dateSpan = document.getElementById('date');

        function updateTime() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            var ampm = h >= 12 ? 'PM' : 'AM';

            h = h % 12 || 12; // Convert to 12-hour format

            span.textContent =
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2) + ' ' + ampm;

            // Format and display the date
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            dateSpan.textContent = d.toLocaleDateString('en-US', options);
        }

        // Call updateTime() immediately to display the time and date
        updateTime();

        // Update the time and date every second
        // setInterval(updateTime, 1000);
    </script>
</body>

</html>