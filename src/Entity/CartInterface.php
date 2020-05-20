<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
interface CartInterface extends ResourceInterface
{
    public function getCreateDate(): ?\DateTimeInterface;

    public function setCreateDate(\DateTimeInterface $createDate): Cart;

    public function getValue(): ?float;

    public function setValue(float $value): Cart;

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection;

    public function addProduct(Product $product): Cart;

    public function removeProduct(Product $product): Cart;

}
