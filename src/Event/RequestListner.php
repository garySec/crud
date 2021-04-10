<?php

namespace App\Event;

use App\Entity\RequestSave;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class RequestListner
{   
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
          $this->em = $em;
    }


    public function eventOpen($event) 
    {   
    	//dump($event);
        $data = $event->getRequest()->request->all();
        $url = $event->getRequest()->getUri();
        $requestSave = new RequestSave();
        $requestSave->setUrl($url);
        $requestSave->setParams(json_encode($data));
        $this->em->persist($requestSave);
        $this->em->flush();
    }
}