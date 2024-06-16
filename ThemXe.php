<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Thêm Xe</title>
</head>
<body>
    <form action="">
        <h1>Thêm xe</h1>
        <table>
            <tr>
                <td>Mã xe</td>
                <td><input type="text" name="maxe" id="maxe" placeholder="51E-xxx.xx"></td>
            </tr>
            <tr>
                <td>Tên xe</td>
                <td><input type="text" name="tenxe" id="tenxe" placeholder="Forester"></td>
            </tr>
            <tr>
                <td>Hãng xe</td>
                <td><input type="text" name="hangxe" id="hangxe" placeholder="Subaru"></td>
            </tr>
            <tr>
                <td>Số chỗ</td>
                <td><input type="number" name="socho" id="socho" placeholder="5"></td>
            </tr>
            <tr>
                <td>Năm sản xuất</td>
                <td><input type="text" name="namsx" id="namsx" placeholder="2022"></td>
            </tr>
            <tr>
                <td>Đơn giá thuê</td>
                <td><input type="number" name="dgthue" id="dgthue" placeholder="1000000"></td>
            </tr>
            <tr>
                <td><h1><input type="submit" name="submit" id="submit" value="Thêm"></h1></td>
            </tr>
        </table>
    </form>
</body>

<?php 
    if (isset($_GET['submit']) && $_GET['submit'] == 'Thêm') {
        $maxe = $_GET['maxe'];
        $tenxe = $_GET['tenxe'];
        $hangxe = $_GET['hangxe'];
        $socho = $_GET['socho'];
        $namsx = $_GET['namsx'];
        $dgthue = $_GET['dgthue'];

        include("connect.php");

        //Thêm xe vào database
        $str = "INSERT INTO `xe`(`soxe`, `tenxe`, `hangxe`, `socho`, `namsx`, `dgthue`, `tinhtrang`) VALUES ('$maxe','$tenxe','$hangxe','$socho','$namsx','$dgthue','0')";

        if ($connect->query($str) == true) {
            echo "Thêm xe thành công!";
        } else {
            echo "Thêm xe không thành công...";
        }
        $connect->close();
    }
?>
</html>