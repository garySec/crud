<?php

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;
use App\Event\RequestLog;

class EventListener
{
	public function eventOpen($post) 
	{	
		$data = $post->getRequest()->request->get('post');
		$url = $post->getRequest()->getSchemeAndHttpHost().$post->getRequest()->getPathInfo();

		// dump($post);die;
	}
}