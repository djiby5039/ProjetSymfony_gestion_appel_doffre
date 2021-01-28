<?php

namespace App\Controller;

use App\Entity\Dossieradministratif;
use App\Form\DossieradministratifType;
use App\Repository\DossieradministratifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use setasign\Fpdi\Fpdi ;

/**
 * @Route("/dossieradministratif")
 */
class DossieradministratifController extends AbstractController
{
    /**
     * @Route("/", name="dossieradministratif_index", methods={"GET"})
     */
    public function index(DossieradministratifRepository $dossieradministratifRepository): Response
    {
        return $this->render('dossieradministratif/index.html.twig', [
            'dossieradministratifs' => $dossieradministratifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossieradministratif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dossieradministratif = new Dossieradministratif();
        $form = $this->createForm(DossieradministratifType::class, $dossieradministratif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossieradministratif);
            $entityManager->flush();

            $file =  "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/dossier_administratif/dossier_administratif.pdf";
            
            $newFile = "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/dossier_administratif/dossier_administratif_".$dossieradministratif->getId().".pdf";
            
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

            

            $dossieradministratif->setFichier("dossieradministratif".$dossieradministratif->getId().".pdf");
            $entityManager->persist($dossieradministratif);
            $entityManager->flush();
            return $this->redirectToRoute('dossieradministratif_index');
        }

        return $this->render('dossieradministratif/new.html.twig', [
            'dossieradministratif' => $dossieradministratif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossieradministratif_show", methods={"GET"})
     */
    public function show(Dossieradministratif $dossieradministratif): Response
    {
        return $this->render('dossieradministratif/show.html.twig', [
            'dossieradministratif' => $dossieradministratif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossieradministratif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dossieradministratif $dossieradministratif): Response
    {
        $form = $this->createForm(DossieradministratifType::class, $dossieradministratif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossieradministratif_index');
        }

        return $this->render('dossieradministratif/edit.html.twig', [
            'dossieradministratif' => $dossieradministratif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossieradministratif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dossieradministratif $dossieradministratif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossieradministratif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossieradministratif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dossieradministratif_index');
    }
}
