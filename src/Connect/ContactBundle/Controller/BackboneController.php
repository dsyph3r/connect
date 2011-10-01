<?php

namespace Connect\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use Connect\ContactBundle\Entity\Contact;
use Connect\ContactBundle\Form\ContactType;

class BackboneController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConnectContactBundle:Backbone:index.html.twig');
    }
}
