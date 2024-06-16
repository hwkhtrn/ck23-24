<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Trả Xe</title>
</head>
<body>
    <form action="">
        <h1>Thông tin trả xe</h1>
        <table>
            <tr>
                <td>Họ tên khách hàng</td>
                <td>
                    <select name="makh" id="makh">
                        <?php 
                            include("connect.php");

                            $str = "SELECT `makh`, `tenkh` FROM `khachhang`";
                            $result = $connect->query($str);
                            while ($row = $result->fetch_row()) {                    
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            $connect->close();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã xe</td>
                <td><input type="text" name="maxe" id="maxe" placeholder="01"></td>
            </tr>
            <tr>
                <td>Ngày thuê</td>
                <td><input type="date" name="ngaythue" id="ngaythue" placeholder="10/12/2023"></td>
            </tr>
            <tr>
                <td>Ngày trả</td>
                <td><input type="date" name="ngaytra" id="ngaytra" placeholder="11/12/2023"></td>
            </tr>
            <tr>
                <td><h1><input type="submit" name="submit" id="submit" value="Trả xe"></h1></td>
            </tr>
        </table>
    </form>
</body>

<?php 
    if (isset($_GET['submit']) && $_GET['submit'] == 'Trả xe') {
        $makh = $_GET['makh'];
        $maxe = $_GET['maxe'];
        $ngaythue = $_GET['ngaythue'];
        $ngaytra = $_GET['ngaytra'];
        $songaythue;

        include("connect.php");

        //Đảm bảo Mã Thuê là khác nhau
        $str = "SELECT `mat` FROM `thue` ORDER BY `mat` DESC";
        $result = $connect->query($str);
        if ($result->num_rows == 0) {
            $mat = 1;
        } else {
            $row = $result->fetch_row();
            $mat = $row[0] + 1;
        }

        //Tính giá thuê
        $sql = $connect->query("SELECT `dgthue` FROM `xe` WHERE `soxe` = '$maxe'");
        $dgthue = $sql->fetch_row();
            echo $dgthue[0];

        if ($ngaythue > $ngaytra) {
            echo "Ngày thuê không được lớn hơn ngày trả!";
            return;
        } else if ($ngaythue == $ngaytra) {
            $songaythue = 1;
                // echo $songaythue;
        } else {
            $earlier = new DateTime($ngaythue);
            $later = new DateTime($ngaytra);

            $songaythue = $later->diff($earlier)->format("%a");
                echo $songaythue;
        }
        $giathue = $dgthue[0] * $songaythue;
        echo $giathue;
        
        //Thêm vào database
        $str = "INSERT INTO `thue`(`mat`, `makh`, `soxe`, `ngaythue`, `ngaytra`, `giathue`) VALUES ('$mat','$makh','$maxe','$ngaythue','$ngaytra','$giathue')";
        if ($connect->query($str) == true) {
            echo "Trả xe thành công!";
        } else {
            echo "Trả xe không thành công...";
        }
        $connect->close();
    }
?>
</html>