<script type="text/javascript">
    function EditCart(id, type) {
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                // Nếu yêu cầu thành công, cập nhật lại nội dung của giỏ hàng
                document.getElementById("cart").innerHTML = xmlHttp.responseText;
            }
        }
        // Gửi yêu cầu AJAX đến server để thực hiện thay đổi trong giỏ hàng
        var url = "EditCart.php?id=" + id + "&type=" + type;
        xmlHttp.open("GET", url, true);
        xmlHttp.send();
    }
</script>
<?php
if(isset($_SESSION['Cart'])) {
    $items = $cart->GetCart();
    $titles = array("Tên sách  ", "Giá sản phẩm  ", "Số lượng  ", "Thêm/Giảm/Xóa  ", "Thành tiền");
    $total = 0;
    echo '<div id="cart"><table>';
    echo '<tr>';
    foreach ($titles as $title) {
        echo '<th>' . $title . '&nbsp;</th>';
    }
    echo '</tr>';
    foreach($items as $id => $value) {
        echo '<tr>';
        echo '<td>' . $value->GetTen() . '</td>';
        echo '<td style="text-align:center">' . number_format(($value->GetGia()), 0, ',', '.') . 'đ</td>';
        echo '<td style="text-align:center">' . $value->GetSL() . '</td>';
        $t = ($value->GetSL()) * ($value->GetGia());
        $total += $t;
        echo '<td style="text-align:center">
            <a href="#" onclick="EditCart(' . $id . ',0)">Thêm</a>
            <a href="#" onclick="EditCart(' . $id . ',1)">Giảm</a>
            <a href="#" onclick="EditCart(' . $id . ',2)">Xóa</a>
            </td>';
        echo '<td style="text-align:right">' . number_format($t, 0, ',', '.') . 'đ</td>';
        echo '</td>';
    }
    echo '<tr><td></td>
        <td></td>
        <td colspan="3" style="text-align:right; color:red; font-weight:bold">Tổng tiền: ' . number_format($total, 0, ',', '.') . 'đ</td></tr>';
    echo '</table><br><a href="TrangChu.php">Trang chủ</a></div>';
} else {
    echo 'Chưa có sản phẩm nào trong giỏ hàng. <a href="TrangChu.php">Quay về</a>';
}
?>
