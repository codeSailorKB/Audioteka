<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class CartService implements CartServiceInterface
{
    private $cartRepository;
    private $productRepository;
    private $om;

    public function __construct(EntityRepository $cartRepository, EntityRepository $productRepository, EntityManagerInterface $om)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->om = $om;
    }

    public function addProductToCart($cartId, $productId)
    {
        $cart = $this->cartRepository->find($cartId);
        $product = $this->productRepository->find($productId);

        if ($cart && $product && count($cart->getProduct()) < 3) {
            $cart->addProduct($product);
            $value = $this->recountCart($cart);
            $cart->setValue($value);
            $this->om->persist($cart);
            $this->om->flush();
        }
    }

    public function removeProductFromCart($cartId, $productId)
    {
        $cart = $this->cartRepository->find($cartId);
        $product = $this->productRepository->find($productId);

        if ($cart && $product) {
            $cart->removeProduct($product);
            $value = $this->recountCart($cart);
            $cart->setValue($value);
            $this->om->persist($cart);
            $this->om->flush();
        }
    }

    private function recountCart($cart)
    {
        $value = 0;

        foreach ($cart->getProduct() as $product) {
            $value += $product->getPrice();
        }

        return $value;
      }
}
