<?php
include("connect.php");

$chonngay = $_POST['chonngay'];

$sql = "SELECT khachhang.tenkh, xe.soxe, xe.tenxe 
        FROM thue 
        JOIN khachhang ON thue.makh = khachhang.makh
        JOIN xe ON thue.soxe = xe.soxe
        WHERE thue.ngaythue = '$chonngay' AND thue.ngaytra > '$chonngay'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "<tr><th>STT</th><th>Họ tên Khách hàng</th><th>Số Xe</th><th>Tên Xe</th></tr>";
    $stt = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $stt . "</td>
                <td>" . $row['tenkh'] . "</td>
                <td>" . $row['soxe'] . "</td>
                <td>" . $row['tenxe'] . "</td>
              </tr>";
        $stt++;
    }
} else {
    echo "Khách hàng không có lịch sử thuê xe vào ngày này!";
}
$connect->close();