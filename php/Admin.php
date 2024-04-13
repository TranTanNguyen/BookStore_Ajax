<?php
    session_start();
    if (!isset($_SESSION['User'])) {
        echo '<script type="text/javascript">
            window.location = "Login.php";
            </script>';
        exit(); // Thêm dòng này để ngăn mã tiếp tục chạy nếu chuyển hướng.
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm sách</title>
</head>
<body>
<div id="wrapper">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td></td>
                <td>
                    <?php
                        if(isset($_SESSION['User'])) {
                            echo 'Xin Chào ' . $_SESSION['User'] ;
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td><input type="text" name="txtName"/></td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td><input type="text" name="txtTacgia"/></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="txtMota"/></td>
            </tr>
            <tr>
                <td>Giá sách</td>
                 <td><input type="number" name="txtPrice" min="0" max="30000000"/></td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="txtImage"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Thêm" name="btnAdd"/></td>
                <td><a href="Thoat.php">Thoát</a></td>
            </tr>
        </table>  
    </form>
</div>
<?php
    require_once('DbAccess.php');
    if(isset($_POST['btnAdd']))
{
    $ten = $_POST['txtName'];
    $tacgia = $_POST['txtTacgia'];
    $mota = $_POST['txtMota'];
    $gia = $_POST['txtPrice'];
    $file = $_FILES['txtImage'];

    if (!is_dir('images/')) {
        mkdir('images/');
    }

    if (!move_uploaded_file($file['tmp_name'], 'images/'.$file['name'])) {
        echo 'Không thể di chuyển tệp đến thư mục "images/".';
    } else {
        $mysqli = new DbConnect();
        $mysqli->executeInsertBook($ten, $tacgia,$mota,$gia, $file['name']);
    }
}

?>
</body>
</html>
