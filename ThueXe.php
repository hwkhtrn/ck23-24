<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Thuê Xe</title>
</head>

<body>
    <form method="post" id="thueForm">
        <h1>Thuê xe</h1>
        <table>
            <tr>
                <td>Họ tên khách hàng</td>
                <td>
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
                </td>
                <td>Ngày thuê xe</td>
                <td><input type="date" name="ngay" id="ngay"></td>
            </tr>
            <tr>
                <table border="1" cellspacing="3" id="xechuathue">
                    <tr>
                        <th colspan="7">Danh sách các xe chưa thuê</th>
                    </tr>
                    <tr>
                        <th>Số xe</th>
                        <th>Tên xe</th>
                        <th>Hãng xe</th>
                        <th>Năm sản xuất</th>
                        <th>Số chỗ</th>
                        <th>Đơn giá thuê</th>
                        <th>Chọn thuê</th>
                    </tr>
                    <?php
                    include("connect.php");

                    $result = $connect->query("SELECT * FROM `xe` WHERE `tinhtrang` = '0'");

                    if ($result->num_rows == 0) {
                        echo "<tr><th colspan='7'>Không còn xe nào để thuê!</th></tr>";
                    } else {
                        while ($row = $result->fetch_row()) {
                            echo "<tr>
                                        <td class='soxe'>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        <td>$row[4]</td>
                                        <td>$row[3]</td>
                                        <td>$row[5]</td>
                                        <td><input type='button' name='thuexe' class='thuexe' value='Thuê'></td>
                                    </tr>";
                        }
                    }
                    $connect->close();
                    ?>
                </table>
            </tr>
            <tr>
                <table border="1" cellspacing="3" id="xedangthue">
                    <tr>
                        <th colspan="7">Danh sách các xe đang thuê</th>
                    </tr>
                    <tr>
                        <th>Số xe</th>
                        <th>Tên xe</th>
                        <th>Hãng xe</th>
                        <th>Năm sản xuất</th>
                        <th>Số chỗ</th>
                        <th>Đơn giá thuê</th>
                        <th>Chọn thuê</th>
                    </tr>
                    <?php
                    include("connect.php");

                    $result = $connect->query("SELECT * FROM `xe` WHERE `tinhtrang` = '1'");

                    if ($result->num_rows == 0) {
                        echo "<tr><th colspan='7'>Không có xe nào đang được thuê!</th></tr>";
                    } else {
                        while ($row = $result->fetch_row()) {
                            echo "<tr>
                                        <td class='soxe'>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        <td>$row[4]</td>
                                        <td>$row[3]</td>
                                        <td>$row[5]</td>
                                        <td><input type='submit' name='khongthuexe' class='khongthuexe' value='Không thuê'></td>
                                    </tr>";
                        }
                    }
                    $connect->close();
                    ?>
                </table>
            </tr>
        </table>
    </form>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var thuexeBtns = document.querySelectorAll('.thuexe');
        thuexeBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                event.preventDefault();
                var soxe = btn.closest('tr').querySelector('.soxe').textContent;
                var makh = document.querySelector('#thueForm #makh').value;
                var ngay = document.querySelector('#thueForm #ngay').value;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'ThueXe2.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send('soxe=' + soxe + '&makh=' + makh + '&ngay=' + ngay);
            });
        });

        var khongThueXeBtns = document.querySelectorAll('.khongthuexe');
            khongThueXeBtns.forEach(function (btn) {
                btn.addEventListener('click', function (event) {
                    event.preventDefault();
                    var soxe = btn.closest('tr').querySelector('.soxe').textContent;
                    var ngay = document.querySelector('#thueForm #ngay').value;

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'ThueXe3.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            location.reload();
                        }
                    };
                    xhr.send('soxe=' + soxe + '&ngay=' + ngay);
                });
            });
    });
</script>

</html>