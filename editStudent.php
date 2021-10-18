<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $MaSinhVien = $_GET['MaSinhVien'];
        $TenSinhVien = "";
        $NgaySinh = "";
        $QueQuan = "";
        $Email = "";

        $conn = mysqli_connect("localhost", "root", "", "70dctt23");
        if ($conn == false) {
            die("connect fial " . mysqli_connect_error($conn));
        } else { 
            $query = "SELECT * FROM sinhvien where MaSinhVien = '".$MaSinhVien."'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0 ) {
                
                while ($row = mysqli_fetch_assoc($result)) {
                   $TenSinhVien = $row['TenSinhVien'];
                   $QueQuan = $row['QueQuan'];
                   $NgaySinh = $row['NgaySinh'];
                   $Email = $row['Email'];
                }
            } else {
                echo "Data is empty";
            }
        }
    ?>

    <form method="post">
        <h2>Edit dữ liệu</h2>
        <table>
            <tr>
                <td>Mã sinh viên</td>
                <td>
                    <input type="text" name="txtID" id="txtID" value="<?php echo $MaSinhVien ?>"/>
                </td>
            </tr>

            <tr>
                <td>Họ vã tên</td>
                <td>
                    <input type="text" name="txtName" id="txtName" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : $TenSinhVien ?>"/>
                </td>
            </tr>

            <tr>
                <td>Ngày Sinh</td>
                <td>
                    <input type="text" name="txtNgaySinh" id="txtNgaySinh" value="<?php echo isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : $NgaySinh ?>"/>
                </td>
            </tr>

            <tr>
                <td>Quê quán</td>
                <td>
                    <textarea name="txtAddress"><?php echo isset($_POST['txtAddress']) ? $_POST['txtAddress'] : $QueQuan ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="txtEmail" id="txtEmail" value="<?php echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : $Email ?>"/>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" id="btnSave" name="btnSave">Ghi giữ liệu</button>
                    <a href="index.php">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>

    

    <?php 
        function UpdateData() {
            $conn = mysqli_connect("localhost", "root", "", "70dctt23");
            if ($conn == false) {
                die("connect fial " . mysqli_connect_error($conn));
            } else {
                $ID = $_POST['txtID'];
                $name = $_POST['txtName'];
                $QueQuan = $_POST['txtAddress'];
                $NgaySinh = $_POST['txtNgaySinh'];
                $Email = $_POST['txtEmail'];
                $query = "UPDATE sinhvien SET TenSinhVien = '".$name."', NgaySinh = '".$NgaySinh."', Email = '".$Email."', QueQuan = '".$QueQuan."' WHERE MaSinhVien = '".$ID."'";

                $result = mysqli_query($conn, $query);
                if ($result == true) {
                    echo "thêm mới dữ liệu thành công";
                } else {
                    echo "Lỗi ghi dữ liệu" . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSave'])) {
            UpdateData();
        }
    ?>

</body>
</html>