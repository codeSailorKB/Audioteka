<?php
namespace App\EventListener;

use App\Entity\Cart;
use App\Entity\CartInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;

final class CartValueListener
{
    public function preCreate(ResourceControllerEvent  $event)
    {
        $entity = $event->getSubject();

        if (!$entity instanceof Cart) {
            return;
        }

        $this->recountValue($entity);
    }
    public function preUpdate(ResourceControllerEvent  $event)
    {
        $entity = $event->getSubject();

        if (!$entity instanceof Cart) {
            return;
        }

        $this->recountValue($entity);
    }

    private function recountValue(CartInterface $cart)
    {
        $value = 0;

        foreach ($cart->getProduct() as $product) {
            $value += $product->getPrice();
        }

        $cart->setValue($value);
    }
}
