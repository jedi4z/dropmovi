<?php

namespace Dropmovi\FrontendBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Dropmovi\FrontendBundle\Entity\Guest;

class MailerEvent extends Event {

    protected $guest;

    public function __construct(Guest $guest) {
        $this->guest = $guest;
    }

    public function getGuest() {
        return $this->guest;
    }

}

?>