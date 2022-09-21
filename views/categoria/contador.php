<?php
 $cart = \Yii::$app->cart;
if($cart->getItemIds()){
    $count = $cart->getTotalCount();

    echo $count ;
}else{
    echo "0";
}
