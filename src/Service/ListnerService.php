<?php
 
namespace App\Service;

use App\Entity\RequestSave;
use App\Event\RequestListner;
use Doctrine\ORM\EntityManagerInterface;

class ListnerService
{	
	private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

	public function saveRequest($data,$url,$method)
	{	
		if (!$this->em->isOpen()) 
		{
			$this->em = $this->em->create($this->em->getConnection(),$this->em->getConfiguration());
		}
        
        $requestSave = new RequestSave();
        $requestSave->setParams(json_encode($data));
        $requestSave->setUrl($url);
        $requestSave->setMethod($method);
        $this->em->persist($requestSave);
        $this->em->flush();
	}
}