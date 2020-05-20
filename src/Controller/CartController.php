<?php

namespace App\Controller;

use App\Service\CartService;
use FOS\RestBundle\View\View;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends ResourceController
{
    public function addPositionFromApiAction(Request $request, $id, $positionId): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->get(CartService::class)->addProductToCart($id, $positionId);

        return $this->viewHandler->handle($configuration, View::create(null, Response::HTTP_NO_CONTENT));
    }

    public function removePositionFromApiAction(Request $request, $id, $positionId): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->get(CartService::class)->removeProductFromCart($id, $positionId);

        return $this->viewHandler->handle($configuration, View::create(null, Response::HTTP_NO_CONTENT));
    }
}
