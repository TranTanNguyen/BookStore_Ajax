<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <script type="text/javascript">
        function CreateXmlHttpRequest() {
            if(window.XMLHttpRequest)
                return new XMLHttpRequest();
            else if (window.ActiveXObject)
                return new ActiveXObject("Microsoft.XMLHttp");
        }

        function AddCart(id, type) {
            xmlHttp = CreateXmlHttpRequest();

            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById("count").innerHTML = xmlHttp.responseText;
                }
            }

            url = "EditCart.php?id=" + id + "&type=" + type;
            xmlHttp.open("GET", url, true);
            xmlHttp.send();
        }
    </script>
</head>
<body>
<?php
    require_once('Cart.php');

    // Khởi tạo giỏ hàng từ session hoặc tạo mới nếu chưa tồn tại
    $cart = isset($_SESSION['Cart']) ? unserialize($_SESSION['Cart']) : new Cart();

    if($cart->CountItem() > 0) {
        include('ViewCart.php');
    } else {
        echo 'Chưa có sản phẩm nào trong giỏ hàng. <a href="TrangChu.php">Quay về</a>';
    }
?> 
</body>
</html>
