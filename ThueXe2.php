<?php
    include("connect.php");

    $soxe = $_POST['soxe'];
    $makh = $_POST['makh'];
    $ngay = $_POST['ngay'];

    //Đảm bảo Mã Thuê là khác nhau
    $str = "SELECT `mat` FROM `thue` ORDER BY `mat` DESC";
    $result = $connect->query($str);
    if ($result->num_rows == 0) {
        $mat = 1;
    } else {
        $row = $result->fetch_row();
        $mat = $row[0] + 1;
    }

    $sql = "INSERT INTO `thue`(`mat`, `makh`, `soxe`, `ngaythue`, `ngaytra`, `giathue`) VALUES ('$mat', '$makh', '$soxe', '$ngay', '', 10000000)";
    $sql2 = "UPDATE `xe` SET `tinhtrang`= 1 WHERE `soxe`='$soxe'";

    if ($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE) {
        echo "Thuê xe thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
