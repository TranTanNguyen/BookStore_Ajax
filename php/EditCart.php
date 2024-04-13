<?PHP
    require_once('Cart.php');
    session_start();
    $cart = unserialize($_SESSION['Cart']);
    $items = $cart->GetCart();
    $id = $_REQUEST['id'];

    switch($_REQUEST['type'])
    {
    case '0':$items [$id]->SetSL($items[$id]->GetSL()+1); break;
    case '1':if($items[$id]->GetSL()>1)
                $items[$id]->SetSL($items[$id]->GetSL()-1);
                else 
                $cart->RemoveItem($id);
                break;
    case'2':
            $cart->RemoveItem($id);
            break;
    }
$_SESSION['Cart']= serialize($cart);
include('ViewCart.php');

?>