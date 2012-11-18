<?php 

namespace Dropmovi\FrontendBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Dropmovi\BackendBundle\Entity\Comment;

class CommentEvent extends Event{

	protected $comment;

	public function __construct(Comment $comment){
		$this->comment = $comment;
	}

	public function getComment(){
		return $this->comment;
	}
}
?>