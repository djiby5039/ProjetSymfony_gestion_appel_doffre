<?php

namespace App\Controller;

use App\Entity\Sommaire;
use App\Form\SommaireType;
use App\Repository\SommaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use setasign\Fpdi\Fpdi;

/**
 * @Route("/sommaire")
 */
class SommaireController extends AbstractController
{
    /**
     * @Route("/", name="sommaire_index", methods={"GET"})
     */
    public function index(SommaireRepository $sommaireRepository): Response
    {
        return $this->render('sommaire/index.html.twig', [
            'sommaires' => $sommaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sommaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sommaire = new Sommaire();
        $form = $this->createForm(SommaireType::class, $sommaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sommaire);
            $entityManager->flush();

            $file =  "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/sommaire/sommaire.pdf";
            
            $newFile = "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/sommaire/sommaire_".$sommaire->getId().".pdf";
            
            copy($file, $newFile );
            // initie FPDI 
            $pdf = new  Fpdi();
           // ajoute une page 
            $pdf->AddPage();
            // définit le fichier source 
            $pdf->setSourceFile($newFile);
             // page d'importation 1 
             $tplId = $pdf->importPage(1);
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica','B',12);

            $pdf->SetAutoPageBreak( true );
            $pdf->Output('F', $newFile); 

            $sommaire->setFichier("sommaire".$sommaire->getId().".pdf");


            $entityManager->persist($sommaire);
            $entityManager->flush();

            return $this->redirectToRoute('sommaire_index');
        }

        return $this->render('sommaire/new.html.twig', [
            'sommaire' => $sommaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sommaire_show", methods={"GET"})
     */
    public function show(Sommaire $sommaire): Response
    {
        return $this->render('sommaire/show.html.twig', [
            'sommaire' => $sommaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sommaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sommaire $sommaire): Response
    {
        $form = $this->createForm(SommaireType::class, $sommaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sommaire_index');
        }

        return $this->render('sommaire/edit.html.twig', [
            'sommaire' => $sommaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sommaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sommaire $sommaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sommaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sommaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sommaire_index');
    }
}
