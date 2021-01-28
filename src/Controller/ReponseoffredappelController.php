<?php

namespace App\Controller;

use App\Entity\Reponseoffredappel;
use App\Form\ReponseoffredappelType;
use App\Repository\ReponseoffredappelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reponseoffredappel")
 */
class ReponseoffredappelController extends AbstractController
{
    /**
     * @Route("/", name="reponseoffredappel_index", methods={"GET"})
     */
    public function index(ReponseoffredappelRepository $reponseoffredappelRepository): Response
    {
        return $this->render('reponseoffredappel/index.html.twig', [
            'reponseoffredappels' => $reponseoffredappelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reponseoffredappel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reponseoffredappel = new Reponseoffredappel();
        $form = $this->createForm(ReponseoffredappelType::class, $reponseoffredappel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reponseoffredappel);
            $entityManager->flush();

            return $this->redirectToRoute('reponseoffredappel_index');
        }

        return $this->render('reponseoffredappel/new.html.twig', [
            'reponseoffredappel' => $reponseoffredappel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reponseoffredappel_show", methods={"GET"})
     */
    public function show(Reponseoffredappel $reponseoffredappel): Response
    {
        return $this->render('reponseoffredappel/show.html.twig', [
            'reponseoffredappel' => $reponseoffredappel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reponseoffredappel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reponseoffredappel $reponseoffredappel): Response
    {
        $form = $this->createForm(ReponseoffredappelType::class, $reponseoffredappel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponseoffredappel_index');
        }

        return $this->render('reponseoffredappel/edit.html.twig', [
            'reponseoffredappel' => $reponseoffredappel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reponseoffredappel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reponseoffredappel $reponseoffredappel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponseoffredappel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reponseoffredappel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reponseoffredappel_index');
    }
}
