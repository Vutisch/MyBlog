<?php


namespace Vutisch\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vutisch\BlogBundle\Entity\Enquiry;
use Symfony\Component\HttpFoundation\Request;
use Vutisch\BlogBundle\Form\EnquiryType;


class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('@VutischBlog/Page/index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@VutischBlog/Page/page.html.twig');
    }


    public function contactAction(Request $request)
    {
        $enquiry= new Enquiry();

        $form = $this->createForm(EnquiryType::class, $enquiry);



        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $enquiry = $form->getData();
            $message = (new \Swift_Message('hello'))
                ->setFrom('Vutisch@mail.ru')
                ->setTo('Vutisch@gmail.com')
                ->setBody(
                    $this->renderView('@VutischBlog/Page/email.html.twig', array('enquiry' => $enquiry)


                ),
                'text/html'
        );

            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');


            return $this->redirectToRoute('vutisch_blog_contact');

        }

        return $this->render('@VutischBlog/Page/contact.html.twig', array(
            'form' => $form->createView(),
        ));




        


    }
}