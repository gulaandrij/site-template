<?php

namespace App\Controller;

use App\Entity\User;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DemoController
 *
 * @package App\Controller
 */
class DemoController extends FOSRestController
{

    /**
     *
     * @Rest\Route("/demo", name="test", methods={"GET"})
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        $admin = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        $context = new Context();
        $context->setSerializeNull(true);
        $context->setGroups(['public']);

        $view = $this->view($admin);
        $view->setContext($context);
        return $this->handleView($view);
    }
}
