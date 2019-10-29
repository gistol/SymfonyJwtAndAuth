<?php

namespace App\Controller;

use App\Entity\Levels;
use App\Entity\ResourceCategories;
use App\Entity\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Route("/api",name="api_")
 */
class ResourceCategoriesController extends AbstractFOSRestController
{
    /**
     * @Route("/resourceCategories", name="resourceCategories")
     */
    public function getResourceCategoriesAction()
    {
        $result = [
            [
                "id" => "1QBCW5BWHNDNDMYD2B72A5JQYW",
        "title" => "Топ 10 ошибок по Математике",
        "image" => [
        "url" => "https://.storage.googleapis.com/resource_categories/images/1QB/CW5/BWH/original/%D0%B0%D0%B2%D0%B0%D1%82%D0%B0%D1%80%D0%BA%D0%B01.jpg?1551781299",
            "width" => 603,
            "height" => 369
                   ],

            ],

            [
                "id" => "1RDQTST3TZ0KFJVPZ6D5N77VM8",
                "title" => "Топ 10 ошибок по Обществознанию",
                "image" => [
                "url" => "https://.storage.googleapis.com/resource_categories/images/1RD/QTS/T3T/original/%D0%B0%D0%B2%D0%B0%D1%82%D0%B0%D1%80%D0%BA%D0%B02.jpg?1551781346",
                "width" => 603,
                "height" => 369
                            ],
            ],

        ];

        return $this->handleView($this->view($result));
    }
    /**
     * @Route("/resourceCategories/{id}", name="resourceCategories_show")
     */
    public function showresourceCategories(ResourceCategories $resourceCategories)
    {
        return $this->handleView($this->view($resourceCategories));
    }
}