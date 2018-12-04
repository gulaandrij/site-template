<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class UserFixture.
 */
class UserFixture extends Fixture implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        /**
         * @var User
         */
        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@mail.com');
        $admin->setEnabled(true);
        $admin->setPlainPassword('passwd');
        $admin->setRoles(['ROLE_ADMIN']);
        $userManager->updateUser($admin);
    }
}
