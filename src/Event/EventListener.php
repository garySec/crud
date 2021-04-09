<?php

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;
use App\Event\RequestLog;

class EventListener
{
	public function eventOpen($post) 
	{	
		// $new = $post->getRequest()->request->get('post');
		// $new = $post->getRequest()->getSchemeAndHttpHost().$post->getRequest()->getPathInfo();
		dump($post);die;
	}
}