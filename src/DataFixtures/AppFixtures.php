<?php

namespace App\DataFixtures;

use App\Entity\Login;
use App\Entity\UserType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Login();
        $user->setUsername('asd');

        $password = $this->encoder->encodePassword($user, 'asd');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}