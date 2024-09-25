<!DOCTYPE html>
<html>

<body>
    <p id="tutorial"></p>
    <script>
        const date = new Date();
        const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', hour12: true };

        const friendlyDate = date.toLocaleDateString(undefined, dateOptions);
        const friendlyTime = date.toLocaleTimeString(undefined, timeOptions);

        const friendlyDateTime = `${friendlyDate} ${friendlyTime}`;

        document.getElementById("tutorial").innerHTML = friendlyDateTime;

        // Log the friendly date and time to the console
        console.log(friendlyDateTime);

        // Create a JavaScript object with the friendly date and time
        const datetimeObject = { datetime: friendlyDateTime };

        // Convert the object to a JSON string
        const jsonString = JSON.stringify(datetimeObject);

        // Log the JSON string to the console
        console.log(jsonString);
    </script>
</body>

</html>