<?php

namespace Connect\ContactBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Connect\ContactBundle\Entity\Contact;

class ContactFixtures implements FixtureInterface
{
    public function load($manager)
    {
        $contact1 = new Contact();
        $contact1->setName('dsyph3r');
        $contact1->setEmail('d.syph.3r@gmail.com');
        $contact1->setLocation('Cardiff, Wales, UK');
        $contact1->setWebsite('blog.dsyph3r.com');
        $contact1->setTel('12345422132');
        $contact1->setMobile('+446532134234');
        $contact1->setAdditional('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim rutrum hendrerit. Duis volutpat, libero at pretium semper, mauris mi egestas est, ut blandit leo purus et odio. Aliquam pharetra sodales orci in vestibulum. Pellentesque sit amet nisl quis magna tempor varius. Nullam vehicula aliquet nunc ut pellentesque. Nunc semper dictum libero a varius. Sed nec ultricies nibh. Proin tempor posuere dolor at pretium. Sed porta erat vitae erat venenatis facilisis. In dignissim est a tortor auctor quis egestas ligula fermentum. Nulla et leo dolor, eu rhoncus erat. Proin ullamcorper, mauris nec semper interdum, enim metus tempor tortor, sed rutrum est urna elementum velit. Maecenas vitae ipsum ligula. Duis molestie semper magna, nec vestibulum quam sagittis vel. Donec commodo quam vel lacus lobortis sed cursus velit volutpat. Ut porta venenatis dolor, in volutpat velit aliquet sed.');
        $manager->persist($contact1);

        $contact2 = new Contact();
        $contact2->setName('Suzanne D. McPherson');
        $contact2->setEmail('SuzanneDMcPherson@teleworm.com');
        $contact2->setLocation('Tyrone, PA');
        $contact2->setWebsite('DiningValue.com');
        $contact2->setTel('814-686-2531');
        $contact2->setMobile('814-686-2531');
        $contact2->setAdditional('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula aliquet nunc ut pellentesque. Nunc semper dictum libero a varius. Sed nec ultricies nibh. Proin tempor posuere dolor at pretium. Sed porta erat vitae erat venenatis facilisis. In dignissim est a tortor auctor quis egestas ligula fermentum. Nulla et leo dolor, eu rhoncus erat. Proin ullamcorper, mauris nec semper interdum, enim metus tempor tortor, sed rutrum est urna elementum velit. Maecenas vitae ipsum ligula. Duis molestie semper magna, nec vestibulum quam sagittis vel. Donec commodo quam vel lacus lobortis sed cursus velit volutpat. Ut porta venenatis dolor, in volutpat velit aliquet sed.');
        $manager->persist($contact2);

        $contact3 = new Contact();
        $contact3->setName('Mary W. Morgan');
        $contact3->setEmail('MaryWMorgan@teleworm.com');
        $contact3->setLocation('51429 Bergisch Gladbach Lückerath');
        $contact3->setWebsite('LogTrades.com');
        $contact3->setTel('02202 27 05 93');
        $contact3->setMobile('02202 27 05 93');
        $contact3->setAdditional('Lorem ipsum dolor sit amet, cons. Pellentesque sit amet nisl quis magna tempor varius. Nullam vehicula aliquet nunc ut pellentesque. Nunc semper dictum libero a varius. Sed nec ultricies nibh. Proin tempor posuere dolor at pretium. Sed porta erat vitae erat venenatis facilisis. In dignissim est a tortor auctor quis egestas ligula fermentum. Nulla et leo dolor, eu rhoncus erat. Proin ullamcorper, mauris nec semper interdum, enim metus tempor tortor, sed rutrum est urna elementum velit. Maecenas vitae ipsum ligula. Duis molestie semper magna, nec vestibulum quam sagittis vel. Donec commodo quam vel lacus lobortis sed cursus velit volutpat. Ut porta venenatis dolor, in volutpat velit aliquet sed.');
        $manager->persist($contact3);

        $manager->flush();
    }

}
