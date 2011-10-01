<?php

namespace Connect\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use Connect\ContactBundle\Entity\Contact;
use Connect\ContactBundle\Form\ContactType;

class ContactController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConnectContactBundle:Contact:index.html.twig');
    }

    public function newContactsAction()
    {
        $contact = new Contact();
        $form   = $this->createForm(new ContactType(), $contact);

        $view = View::create();
        $view->setTemplate('ConnectContactBundle:Contact:newContacts.html.twig');
        $view->setData(array(
            'contact'   => $contact,
            'form'      => $form->createView()
        ));

        return $view;
    } // "new_contacts"    [GET] /contacts/new

    public function getContactsAction()
    {
        $em         = $this->get('doctrine')->getEntityManager();
        $contacts   = $em->getRepository('ConnectContactBundle:Contact')->findAll();

        $view = View::create();
        $handler = $this->get('fos_rest.view_handler');
        if ('html' === $this->getRequest()->getRequestFormat())
            $view->setData(array('contacts' => $contacts));
        else
            $view->setData($contacts);
        $view->setTemplate('ConnectContactBundle:Contact:getContacts.html.twig');

        return $view;
    } // "get_contacts"    [GET] /contacts

    public function postContactsAction()
    {
        $request = $this->getRequest();

        $values = $request->get('contact', array());
        if ('json' === $this->getRequest()->getRequestFormat())
        {
            $values['name'] = $request->get('name');
            $values['email'] = $request->get('email');
            $values['location'] = $request->get('location');
            $values['website'] = $request->get('website');
            $values['tel'] = $request->get('tel');
            $values['mobile'] = $request->get('mobile');
            $values['additional'] = $request->get('additional');
        }
        $contact = new Contact();
        $contact->setName($values['name']);
        $contact->setEmail($values['email']);
        $contact->setLocation($values['location']);
        $contact->setWebsite($values['website']);
        $contact->setTel($values['tel']);
        $contact->setMobile($values['mobile']);
        $contact->setAdditional($values['additional']);

        $em = $this->get('doctrine')->getEntityManager();
        $em->persist($contact);
        $em->flush();

        if ('html' === $this->getRequest()->getRequestFormat())
        {
            return $this->redirect($this->generateUrl('connect_get_contacts'));
        }

        $view = View::create();
        $view->setData($contact);

        return $view;
    } // "post_contacts"   [POST] /contacts

    public function getContactAction($id)
    {
        $em         = $this->get('doctrine')->getEntityManager();
        $contact    = $em->getRepository('ConnectContactBundle:Contact')->find($id);

        $view = View::create();
        $view->setData($contact);

        return $view;
    } // "get_contact"     [GET] /contacts/{$id}

    public function putContactAction($id)
    {
        $em         = $this->get('doctrine')->getEntityManager();
        $contact    = $em->getRepository('ConnectContactBundle:Contact')->find($id);

        $request = $this->getRequest();

        $event->setDone($request->get('done'));
        $em->persist($contact);
        $em->flush();

        $view = View::create();
        $view->setData($event);

        return $view;
    } // "put_contact"     [PUT] /contacts/{id}

    public function deleteContactAction($id)
    {
        $em         = $this->get('doctrine')->getEntityManager();
        $contact    = $em->getRepository('ConnectContactBundle:Contact')->find($id);

        $em->remove($contact);
        $em->flush();

        if ('html' === $this->getRequest()->getRequestFormat())
        {
            return $this->redirect($this->generateUrl('connect_get_contacts'));
        }
        
        $view = View::create();
        $view->setTemplate('ConnectContactBundle:Contact:deleteContact.html.twig');

        return $view;
    } // "delete_contact"  [DELETE] /contacts/{$id}

}
