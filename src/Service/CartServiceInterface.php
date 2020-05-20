<?php

namespace App\Service;

interface CartServiceInterface
{
    public function addProductToCart($cartId, $productId);

    public function removeProductFromCart($cartId, $productId);

}
