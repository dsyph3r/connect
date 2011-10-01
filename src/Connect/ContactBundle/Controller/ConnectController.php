<?php

namespace Connect\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConnectContactBundle:Connect:index.html.twig');
    }
}
