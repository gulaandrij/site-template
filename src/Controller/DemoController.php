<?php

namespace App\Controller;

use App\Entity\User;
use App\Traits\SerializerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DemoController
 *
 * @package App\Controller
 */
class DemoController extends Controller
{
    use SerializerTrait;

    /**
     *
     * @Route("/demo", name="test", methods={"GET"})
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        $admin = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        return new Response($this->s->serialize($admin,['public']));
    }
}
