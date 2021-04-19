<?php

namespace App\DataFixtures;

use App\Entity\UserHobbie;
use App\Entity\UserType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class HobbieFixture extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $HobbieQuery = "INSERT INTO `user_hobbie` (`id`, `hobbie`) VALUES ('1', 'Cricket'),('2', 'Base-ball'),('3', 'Wally-ball'),('4', 'hockey'),('5', 'Drawing'),('6', 'Etc.');";
        $manager->getConnection()->exec($HobbieQuery);

        $TypeQuery = "INSERT INTO `user_type` (`id`, `type`) VALUES ('1', 'Admin'),('2', 'Customer'),('3', 'Supllier'),('4', 'Visiter');";
        $manager->getConnection()->exec($TypeQuery);

        $manager->flush();
    }       
}