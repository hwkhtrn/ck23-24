<?php
    include("connect.php");

    $soxe = $_POST['soxe'];
    $ngay = $_POST['ngay'];
    $songaythue;

    $mathue = $connect->query("SELECT `mat` FROM `thue` WHERE `soxe` = '$soxe' ORDER BY `mat` DESC");
    $mat = $mathue->fetch_row();

    $sql = "UPDATE `thue` SET `ngaytra`= '$ngay' WHERE `soxe` = '$soxe' AND `mat` = '$mat[0]'";
    $sql2 = "UPDATE `xe` SET `tinhtrang`= 0 WHERE `soxe` = '$soxe'";

    if ($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE) {
        echo "Hủy thuê xe thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    //Tính giá thuê
    $sql = $connect->query("SELECT `dgthue` FROM `xe` WHERE `soxe` = '$soxe'");
    $sql2 = $connect->query("SELECT `ngaythue`, `ngaytra`, `mat` FROM `thue` WHERE `soxe` = '$soxe' AND `mat` = '$mat[0]'");

    $dgthue = $sql->fetch_row();
    $ngay = $sql2->fetch_row();
    if ($ngay[0] > $ngay[1]) {
        echo "Ngày thuê không được lớn hơn ngày trả!";
        return;
    } else if ($ngay[0] == $ngay[1]) {
        $songaythue = 1;
    } else {
        $earlier = new DateTime($ngay[0]);
        $later = new DateTime($ngay[1]);

        $songaythue = $later->diff($earlier)->format("%a");
    }

    $giathue = $dgthue[0] * $songaythue;
    $sql = "UPDATE `thue` SET `giathue`= '$giathue' WHERE `soxe` = '$soxe' AND `mat` = '$mat[0]'";
    $connect->query($sql);
    $connect->close();
