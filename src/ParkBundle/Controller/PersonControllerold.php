<?php

namespace ParkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkBundle\Entity\Person;

/**
 * Person controller.
 */
class PersonController extends Controller
{

    /**
     * Lists all persons
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $persons = $em->getRepository('ParkBundle:Person')->findAll();

        return $this->render('ParkBundle:Person:index.html.twig', array(
            'persons' => $persons,
        ));
    }


    /**
     * Show person
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $person = $em->getRepository('ParkBundle:Person')->findOneWithComputersEnabled($id);

        if (!$person) {
            throw $this->createNotFoundException('Unable to find person.');
        }

        return $this->render('ParkBundle:Person:show.html.twig', array(
            'person' => $person,
        ));
    }

}
