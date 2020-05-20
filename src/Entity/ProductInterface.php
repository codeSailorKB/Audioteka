<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
interface ProductInterface extends ResourceInterface
{
    public function getTitle(): ?string;

    public function setTitle(string $title): Product;

    public function getPrice(): ?float;

    public function setPrice(float $price): Product;

    /**
     * @return Collection|Cart[]
     */
    public function getCart(): Collection;

    public function addCart(Cart $cart): Product;

    public function removeCart(Cart $cart): Product;
}
