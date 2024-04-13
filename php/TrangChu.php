<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript">
    function CreateXmlHttpRequest() {
        if(window.XMLHttpRequest)
            return new XMLHttpRequest();
        else if (window.ActiveXObject)
            return new ActiveXObject("Microsoft.XMLHttp");
    }
    function AddCart(id, ten, tacgia, mota, gia, anh) {
        xmlHttp = CreateXmlHttpRequest();

        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById("count").innerHTML = xmlHttp.responseText;
            }
        }

        url = "AddCart.php?id=" + id + "&ten=" + ten + "&tacgia=" + tacgia + "&mota=" + mota + "&gia=" + gia + "&anh=" +anh;

        xmlHttp.open("GET", url, true);
        xmlHttp.send();
    }
</script>

</head>
<body>
    <div class="showproduct">
        <?php
            require_once('DbAccess.php');
            require_once('Cart.php');

            $mysqli = new DbConnect ();

            $results = $mysqli->query('Select * from tbsanpham');
            $count = isset($_SESSION['Cart'])? unserialize($_SESSION['Cart'])->CountItem():0;

            echo'<div id="Cart"><a href="ShowCart.php">Giỏ hàng (<span id ="count">'.$count.'</span>)</a></div>';

            while($row = $results->fetch_assoc())
            {       
                echo "
                <div class=\"product\">
                    <div class=\"image\"><img src=\"images/".$row['Anh']."\"/></div>
                    <div class=\"title\"><a href=\"#\">".$row['Ten']."</a></div>
                    <div class=\"tacgia\">".$row['Tacgia']."</div> 
                    <div class=\"mota\">".$row['Mota']."</div> 
                    <div class=\"price\">".$row['Gia']."đ</div>
                    <div><input type=\"button\" value=\"Mua\" onclick=\"AddCart(".$row['ID'].",'".$row['Ten']."','".$row['Tacgia']."','".$row['Mota']."','".$row['Gia']."','".$row['Anh']."')\"/></div>
                </div>";
            }
        ?>
    </div>
</body>
</html>
