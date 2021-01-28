<?php

namespace App\Controller;

use App\Entity\Pagedegarde;
use App\Form\PagedegardeType;
use App\Repository\PagedegardeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use setasign\Fpdi\Fpdi ;

/**
 * @Route("/pagedegarde")
 */
class PagedegardeController extends AbstractController
{
    /**
     * @Route("/", name="pagedegarde_index", methods={"GET"})
     */
    public function index(PagedegardeRepository $pagedegardeRepository): Response
    {
        return $this->render('pagedegarde/index.html.twig', [
            'pagedegardes' => $pagedegardeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pagedegarde_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pagedegarde = new Pagedegarde();
        $form = $this->createForm(PagedegardeType::class, $pagedegarde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pagedegarde);
            $entityManager->flush();

            $file =  "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/page_de_garde/pages_de_garde.pdf";

            $newFile = "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/page_de_garde/pages_de_garde_".$pagedegarde->getId().".pdf";
            copy($file, $newFile );
            // initie FPDI 
            $pdf = new  Fpdi ();
           // ajoute une page 
            $pdf->AddPage ();
            // définit le fichier source 
            $pdf->setSourceFile($newFile);
             // page d'importation 1 
             $tplId = $pdf->importPage(1);
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            //getNomEtablissement()
            $pdf->SetFont ('Helvetica');
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,258, $pagedegarde->getNumeroCopieoriginal(),0,0,'C');
            $pdf->Cell(180,150, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,200, $pagedegarde->getNomEtablissement(),0,0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getLieu(). ' le '. $lettreDeRetrait->getDate()->format('d M Y'));
              
            $tplId = $pdf->importPage(2);

            $pdf->AddPage ();
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');
            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,258, utf8_encode($pagedegarde->getNumeroCopie1()), 0, 0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getDestinataire());
            
            $tplId = $pdf->importPage(3);

            $pdf->AddPage ();
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');
            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,258, $pagedegarde->getNumeroCopie2() , 0, 0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getAdrDesti());
            
            $tplId = $pdf->importPage(4);

            $pdf->AddPage ();
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');
            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,258, $pagedegarde->getNumeroCopie3() , 0, 0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getReference());
             
            $tplId = $pdf->importPage(5);

            $pdf->AddPage ();
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');
            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,258, $pagedegarde->getNumeroCopie4() , 0, 0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');

            
            $tplId = $pdf->importPage(6);

            $pdf->AddPage ();
            // utilise la page importée et la place au point 10,10 avec une largeur de 100 mm 
            $pdf->useTemplate($tplId);
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');
              //pour la gestion de la position
             $pdf->SetXY(10 ,18);
             $pdf->Cell(180,252, $pagedegarde->getNumeroCopie5(), 0, 0,'C');
             $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');

             
             $tplId = $pdf->importPage(7);

             $pdf->AddPage ();
             $pdf->useTemplate($tplId);
               //pour la gestion de la position
               //getNomEtablissement()
             $pdf->SetXY(10 ,18);
             $pdf->SetFont ('Helvetica');
             $pdf->Cell(180,258, $pagedegarde->getNumeroCopiebureau(), 0, 0,'C');
             $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            $pdf->Cell(180,258, $pagedegarde->getNomEtablissement(),0,0,'C');
            
            
             $tplId = $pdf->importPage(8);

             $pdf->AddPage ();
             $pdf->useTemplate($tplId);
            //Ecrire sur le fichier
            $pdf->SetFont ('Helvetica');
            $pdf->SetXY(80 ,157);
            //$pdf->Cell(0,0, $pagedegarde->getNumeroCopiebureau(), 0, 0,'C');


            $pdf->Output('F', $newFile); 

            $pagedegarde->setFichier("pages_de_garde_".$pagedegarde->getId().".pdf");
            $entityManager = $this->getDoctrine()->getManager();           
            $entityManager->persist($pagedegarde);
            $entityManager->flush();

            return $this->redirectToRoute('pagedegarde_index');
        }

        return $this->render('pagedegarde/new.html.twig', [
            'pagedegarde' => $pagedegarde,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pagedegarde_show", methods={"GET"})
     */
    public function show(Pagedegarde $pagedegarde): Response
    {
        return $this->render('pagedegarde/show.html.twig', [
            'pagedegarde' => $pagedegarde,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pagedegarde_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pagedegarde $pagedegarde): Response
    {
        $form = $this->createForm(PagedegardeType::class, $pagedegarde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pagedegarde_index');
        }

        return $this->render('pagedegarde/edit.html.twig', [
            'pagedegarde' => $pagedegarde,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pagedegarde_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pagedegarde $pagedegarde): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pagedegarde->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pagedegarde);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pagedegarde_index');
    }
}
