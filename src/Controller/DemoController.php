<?php

namespace App\Controller;

use App\Entity\User;
use App\Traits\SerializerTrait;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DemoController.
 */
class DemoController extends FOSRestController
{
    use SerializerTrait;

    /**
     * @Route("/demo", name="test", methods={"GET"})
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        $admin = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        return new Response($this->s->serialize($admin, ['public']));
    }
}
