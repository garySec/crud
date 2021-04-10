<?php

namespace App\Event;

use App\Entity\RequestSave;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ListnerService;
use Doctrine\ORM\EntityManagerInterface;

class RequestListner
{   
    private $data;

    public function __construct(ListnerService $data)
    {
          $this->data = $data;
    }

    public function eventOpen($event) 
    {   
        $data = $event->getRequest()->request->all();
        $url = $event->getRequest()->getUri();
        $method = $event->getRequest()->getMethod();
        $this->data->saveRequest($data,$url,$method);
        // $this->data->saveUrl($url);
    }
}