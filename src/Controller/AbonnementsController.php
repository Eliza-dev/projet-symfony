<?php

namespace App\Controller;

use App\Entity\Abonnements;
use App\Form\AbonnementsType;
use App\Repository\AbonnementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/abonnements")
 */
class AbonnementsController extends AbstractController
{
    /**
     * @Route("/", name="abonnements_index", methods={"GET"})
     */
    public function index(AbonnementsRepository $abonnementsRepository): Response
    {
        return $this->render('abonnements/index.html.twig', [
            'abonnements' => $abonnementsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="abonnements_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $abonnement = new Abonnements();
        $form = $this->createForm(AbonnementsType::class, $abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($abonnement);
            $entityManager->flush();

            return $this->redirectToRoute('abonnements_index');
        }

        return $this->render('abonnements/new.html.twig', [
            'abonnement' => $abonnement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="abonnements_show", methods={"GET"})
     */
    public function show(Abonnements $abonnement): Response
    {
        return $this->render('abonnements/show.html.twig', [
            'abonnement' => $abonnement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="abonnements_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Abonnements $abonnement): Response
    {
        $form = $this->createForm(AbonnementsType::class, $abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('abonnements_index');
        }

        return $this->render('abonnements/edit.html.twig', [
            'abonnement' => $abonnement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="abonnements_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Abonnements $abonnement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$abonnement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($abonnement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('abonnements_index');
    }
}
