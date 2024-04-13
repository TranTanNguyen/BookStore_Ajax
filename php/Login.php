<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.or/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

    session_start();
?>
<html xmlns ="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="text/css" href="styles.css"/>
    <title>Đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" size="20" name="txtUser"/></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" size="20" name="txtPass"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Đăng nhập" name="btnLogin" /></td>
                    <td><input type="reset" value="Làm lại" name="btnReset" /></td>
                </tr>
            </table>
        </form>
    </div>
<?php
    if(isset($_POST['btnLogin']))
    {
        if($_POST['txtUser'] == 'admin' && $_POST['txtPass'] =='admin')
        {
            $_SESSION['User'] = 'admin';
            echo '<script type="text/javascript">
                window.location = "admin.php";
            </script>';
        }
        else
        {
            echo '<script type="text/javascript">
                    alert("Sai tên đăng nhập hoặc mật khẩu.");
                    </script>';
        }
    }
?>
</body>
</html>
