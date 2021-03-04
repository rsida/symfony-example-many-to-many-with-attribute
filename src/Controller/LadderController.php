<?php

namespace App\Controller;

use App\Entity\Accessory;
use App\Entity\Ladder;
use App\Form\AccessoryFormType;
use App\Form\CreateLadderFormType;
use App\Form\LadderAccessoryFormType;
use App\Form\UpdateLadderAccessoryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ladder")
 */
class LadderController extends AbstractController
{
    /**
     * @Route("/create", name="ladder_create")
     */
    public function index(Request $request): Response
    {
        $ladder = new Ladder();
        $form = $this->createForm(CreateLadderFormType::class, $ladder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($ladder);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('ladder_create');
        }

        return $this->render('ladder/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/accessories/update", name="ladder_accessories_update", requirements={"id":"\d+"})
     */
    public function updateAccessories(Request $request, int $id): Response
    {
        $ladder = $this->getDoctrine()->getRepository(Ladder::class)->find($id);
        $form = $this->createForm(UpdateLadderAccessoryFormType::class, $ladder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('ladder_accessories_update', ['id' => $id]);
        }

        return $this->render('ladder/accessories.update.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
