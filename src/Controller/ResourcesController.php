<?php

namespace App\Controller;

use App\Entity\Resources;
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
class ResourcesController extends AbstractFOSRestController
{
    /**
     * @Route("/resources", name="resources")
     */
    #Пусто!
    /**
     * @Route("/resources/{id}", name="resources_show")
     */
    public function getResourcesAction()
    {
        $result = [
            [
                "id" => "1QE9XJ5A692XP2PAMZCTAB04FR",
                "title" => "Неумение работать с формулами стереометрии ",
                "image" => [
                    "url" => "https://.storage.googleapis.com/resources/images/1QE/9XJ/5A6/original/7.jpg?1551783225",
                    "width" => 603,
                    "height" => 369
                ],
                "video" => "https://.storage.googleapis.com/resources/videos/1QE/9XJ/5A6/original/%D0%A0%D0%BE%D0%BB%D0%B8%D0%BA_4_%28%D0%BC%D0%B0%D1%82%D0%B5%D0%BC%D0%B0%D1%82%D0%B8%D0%BA%D0%B0%29.mp4?1524120788",
                "text" => "Неумение работать с формулами стереометрии - эту ошибку совершает более 25% школьников.\n\n В первую очередь это связано с отсутствием пространственного мышления.\n\nАксиомы стереометрии:\n\nЧерез любые три точки, не лежащие на одной прямой, проходит единственная плоскость.\nЕсли две точки прямой лежат в плоскости, то все точки прямой лежат в этой плоскости.\nЕсли две плоскости имеют общую точку, то они имеют общую прямую, на которой лежат все общие точки этих плоскостей.\nСледствия из аксиом стереометрии:\n\nТеорема 1. Через прямую и не лежащую на ней точку проходит единственная плоскость.\nТеорема 2. Через две пересекающиеся прямые проходит единственная плоскость.\nТеорема 3. Через две параллельные прямые проходит единственная плоскость.\n\n\n"
            ]
        ];
        return $this->handleView($this->view($result));
    }
    public function showResources(Resources $resources)
    {
        return $this->handleView($this->view($resources));
    }

}