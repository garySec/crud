<?php

namespace App\DataFixtures;

use App\Entity\UserHobbie;
use App\Entity\UserType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class HobbieFixture extends Fixture 
{
	
	public function load(ObjectManager $em)
	{	
		$hobbie = array('hobbie','Cricket','Base-ball','Wally-ball','hockey','Drawing','Etc.');
		$type = array('Admin','Customer','Supllier','Visiter');

		$y = 0;
		for ($i=1; $i <=6 ; $i++) 
		{
			$UserHobbie = new UserHobbie();
			$UserHobbie->setId($i);
			$UserHobbie->setHobbie($hobbie[$y]);
			$em->persist($UserHobbie);
			$y += 1;
		}


		$x = 0;
		for ($i=1; $i <= 4; $i++) { 
			
			$UserType = new UserType();
			$UserType->setId($i);
			$UserType->setType($type[$x]);
			$em->persist($UserType);
			$x += 1;
		}

		$em->flush();
	}
}