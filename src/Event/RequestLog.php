<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Post;

class RequestLog extends Event {

	public const NAME = "allRequests.AreSave";

	private $post;

	public function __construct(Post $post) 
	{
		$this->post = $post;
	}

	public function getPost() 
	{
		return $this->post;
	}
}
