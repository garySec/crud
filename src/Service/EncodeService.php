<?php

namespace App\Service;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\Login;

class EncodeService
{
	private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

	public function Encode(Login $user)
	{
		$user->setUsername($user->getUsername());
		$user->setPassword($this->passwordEncoder->encodePassword($user,$user->getPassword()));
		return $user;
	}


}