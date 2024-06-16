<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Liệt kê Trả xe</title>
</head>

<body>
    <form action="">
        <h1>Liệt kê Thuê xe</h1>
        Từ ngày <input type="date" name="tungay" id="tungay"> <br><br>
        Đến ngày <input type="date" name="denngay" id="denngay"> <br><br>
        Họ tên Khách hàng
        <select name="makh" id="makh">
            <?php
                include("connect.php");
                $result = $connect->query("SELECT `makh`, `tenkh`FROM `khachhang`");
                while ($row = $result->fetch_row()) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
                $connect->close();
            ?>
        </select>

        <table id="result" border="1" cellspacing=3></table>
    </form>
</body>
<script>
    var tungay = document.getElementById('tungay');
    var denngay = document.getElementById('denngay');
    var makh = document.getElementById('makh');

    makh.addEventListener("change", function(event) {
        if (tungay.value == '') {
            document.getElementById('result').innerHTML = "Chọn ngày bắt đầu!";
            if (denngay.value == '') {
                document.getElementById('result').innerHTML = "Chọn ngày bắt đầu và kết thúc!";
            }
        } else if (denngay.value == '') {
                document.getElementById('result').innerHTML = "Chọn ngày kết thúc!";
        } else {
            handleEvent();
        }
    });

    function handleEvent() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'LietKeTraXe2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById('result').innerHTML = xhr.responseText;
            }
        };
        xhr.send('tungay=' + encodeURIComponent(tungay.value) + '&denngay=' + encodeURIComponent(denngay.value) + '&makh=' + encodeURIComponent(makh.value));
    }
</script>
</html>