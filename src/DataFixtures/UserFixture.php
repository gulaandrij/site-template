<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class UserFixture
 *
 * @package App\DataFixtures
 */
class UserFixture extends Fixture implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@mail.com');
        $admin->setEnabled(true);
        $admin->setPassword('passwd');
        $admin->setRoles(['ROLE_ADMIN']);
        $userManager->updateUser($admin);
    }
}
