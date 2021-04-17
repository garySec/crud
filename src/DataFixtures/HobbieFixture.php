<?php

namespace App\DataFixtures;

use App\Entity\UserHobbie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class HobbieFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = new UserHobbie();
        $types = ['Cricket','Base-ball','Wally-ball','hockey','Drawing','Etc.'];

        $query = "INSERT INTO `user_hobbie` (`id`, `hobbie`) VALUES (NULL, 'Cricket'),(NULL, 'Base-ball'),(NULL, 'Wally-ball'),(NULL, 'hockey'),(NULL, 'Drawing'),(NULL, 'Etc.');";
        $manager->getConnection()->exec($query);

        $manager->flush();      
    }       
}