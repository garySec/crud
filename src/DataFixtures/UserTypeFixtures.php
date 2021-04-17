<?php

namespace App\DataFixtures;

use App\Entity\Login;
use App\Entity\UserType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class UserTypeFixtures extends Fixture
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function load(ObjectManager $manager)
    {
        $data = new UserType();
        $types = ['Admin','Customer','Supllier','Visiter'];

        $query = "INSERT INTO `user_type` (`id`, `type`) VALUES (NULL, 'Admin'),(NULL, 'Customer'),(NULL, 'Supllier'),(NULL, 'Visiter');";
        $manager->getConnection()->exec($query);

        $manager->flush();      
    }       
}