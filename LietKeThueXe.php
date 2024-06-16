<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Liệt kê Thuê xe</title>
</head>

<body>
    <form action="">
        <h1>Liệt kê thuê xe</h1>
        Chọn ngày <input type="date" name="chonngay" id="chonngay">

        <table id="result" border="1" cellspacing=3></table>
    </form>
</body>
<script>
    var inp = document.getElementById('chonngay');

    inp.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            handleEnterKey();
        }
    });

    function handleEnterKey() {
        var chonngay = document.getElementById('chonngay').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'LietKeThueXe2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById('result').innerHTML = xhr.responseText;
            }
        };

        xhr.send('chonngay=' + encodeURIComponent(chonngay));
    }
</script>

</html>