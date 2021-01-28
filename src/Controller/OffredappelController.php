<?php

namespace App\Controller;

use App\Entity\Offredappel;
use App\Form\OffredappelType;
use App\Repository\OffredappelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offredappel")
 */
class OffredappelController extends AbstractController
{
    /**
     * @Route("/", name="offredappel_index", methods={"GET"})
     */
    public function index(OffredappelRepository $offredappelRepository): Response
    {
        return $this->render('offredappel/index.html.twig', [
            'offredappels' => $offredappelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="offredappel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $offredappel = new Offredappel();
        $form = $this->createForm(OffredappelType::class, $offredappel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offredappel);
            $entityManager->flush();

            return $this->redirectToRoute('offredappel_index');
        }

        return $this->render('offredappel/new.html.twig', [
            'offredappel' => $offredappel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offredappel_show", methods={"GET"})
     */
    public function show(Offredappel $offredappel): Response
    {
        return $this->render('offredappel/show.html.twig', [
            'offredappel' => $offredappel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offredappel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Offredappel $offredappel): Response
    {
        $form = $this->createForm(OffredappelType::class, $offredappel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offredappel_index');
        }

        return $this->render('offredappel/edit.html.twig', [
            'offredappel' => $offredappel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offredappel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Offredappel $offredappel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offredappel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($offredappel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offredappel_index');
    }
}
