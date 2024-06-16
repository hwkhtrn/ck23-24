<?php
include("connect.php");

$makh = $_POST['makh'];
$tungay = $_POST['tungay'];
$denngay = $_POST['denngay'];

$sql = "SELECT xe.soxe, xe.tenxe, thue.giathue
        FROM thue
        JOIN xe ON thue.soxe = xe.soxe
        WHERE thue.makh = '$makh' AND thue.ngaytra IS NOT NULL 
        AND thue.ngaythue BETWEEN '$tungay' AND '$denngay'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "<tr><th>STT</th><th>Số xe</th><th>Tên Xe</th><th>Giá Thuê</th></tr>";
    $stt = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $stt . "</td>
                <td>" . $row['soxe'] . "</td>
                <td>" . $row['tenxe'] . "</td>
                <td>" . $row['giathue'] . "</td>
              </tr>";
        $stt++;
    }
} else {
    echo "Khách hàng không có lịch sử trả xe trong khoảng thời gian trên!";
}

$connect->close();
