<?php
    require "config.php";
    if(isset($_POST["add-to-cart"])){
        $message = '';
        if(isset($_COOKIE["shopping_cart"])){
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);

            $cart_data = json_decode($cookie_data, true);
        }
        else{
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'id');

        if(in_array($_POST["p_id"], $item_id_list)){
            foreach($cart_data as $keys => $values){
                if($cart_data[$keys]["id"] == $_POST["p_id"]){
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        }
        else{
            $pkg_array = array(
                "id" => $_POST['p_id'],
                "name" => $_POST['p_name'],
                "price" => $_POST['price']
            );

            $cart_data[] = $pkg_array;
        }
        
        $pkg_data = json_encode($cart_data);
        setcookie('shopping_cart', $pkg_data, time() + (86400 * 30), "/");
        header("location: packages.php?success=1");
    }
    if(isset($_POST["remove_pkg"])){
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]['id'] == $_POST['pkg_id'])
            {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30), "/");
                header("location:packages.php?remove=1");
            }
        }
    }
    if(isset($_GET["success"])){
        $message = '
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Item Added into Cart
        </div>
        ';
    }
    if(isset($_GET["remove"]))
    {
        $message = '
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item removed from Cart
        </div>
        ';
    }
?>
