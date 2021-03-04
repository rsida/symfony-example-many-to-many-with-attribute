<?php

namespace App\Controller;

use App\Entity\Accessory;
use App\Form\AccessoryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accessory")
 */
class AccessoryController extends AbstractController
{
    /**
     * @Route("/create", name="accessory_create")
     */
    public function create(Request $request): Response
    {
        $accessory = new Accessory();
        $form = $this->createForm(AccessoryFormType::class, $accessory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($accessory);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('accessory_create');
        }

        return $this->render('accessory/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
