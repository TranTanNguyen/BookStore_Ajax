<?php
    require_once('Cart.php');
    session_start();
    $cart = isset($_SESSION['Cart']) ? unserialize($_SESSION['Cart']) : new Cart();
    $id = $_REQUEST['id'];
    $ten = $_REQUEST['ten'];
    $tacgia = $_REQUEST['tacgia']; // Sửa lại tên biến
    $mota = $_REQUEST['mota'];
    $gia = $_REQUEST['gia']; // Sửa lại tên biến
    $anh = $_REQUEST['anh']; // Thêm ảnh sách
    $item = new Item ($id, $ten, $tacgia, $mota, $gia, $anh); // Thêm ảnh sách vào đối tượng Item
    $cart->InsertItem($item);
    $_SESSION['Cart'] = serialize($cart);

    echo $cart->CountItem();
?>
