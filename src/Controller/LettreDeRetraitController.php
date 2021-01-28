<?php

namespace App\Controller;

use App\Entity\LettreDeRetrait;
use App\Form\LettreDeRetraitType;
use App\Repository\LettreDeRetraitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use setasign\Fpdi\Fpdi ;
use App\Service\FichierLettreDeRetait;



/**
 * @Route("/lettre/de/retrait")
 */
class LettreDeRetraitController extends AbstractController
{
    /**
     * @Route("/", name="lettre_de_retrait_index", methods={"GET"})
     */
    public function index(LettreDeRetraitRepository $lettreDeRetraitRepository): Response
    {
        return $this->render('lettre_de_retrait/index.html.twig', [
            'lettre_de_retraits' => $lettreDeRetraitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lettre_de_retrait_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lettreDeRetrait = new LettreDeRetrait();
        $form = $this->createForm(LettreDeRetraitType::class, $lettreDeRetrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();           
            $entityManager->persist($lettreDeRetrait);
            $entityManager->flush();


            $file =  "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/documents/cahier_de_charge.pdf";
            
            $newFile = "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/documents/cahier_de_charge_".$lettreDeRetrait->getId().".pdf";
            
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


            //pour la gestion de la position
            $pdf->SetXY(14 ,10);
            $pdf->Cell(280,86, $lettreDeRetrait->getLieu(). ' le '. $lettreDeRetrait->getDate()->format('d M Y') , 0, 0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getLieu(). ' le '. $lettreDeRetrait->getDate()->format('d M Y'));

            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,140, $lettreDeRetrait->getDestinataire() , 0, 0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getDestinataire());
            

            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(180,150, $lettreDeRetrait->getAdrDesti() , 0, 0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getAdrDesti());
            

            //pour la gestion de la position
            $pdf->SetXY(10 ,18);
            $pdf->Cell(100,191, $lettreDeRetrait->getReference() , 0, 0,'C');
            //Ecrire sur le fichier
            //$pdf->Write( 8 , $lettreDeRetrait->getReference());

            //pour la gestion de la position
            $pdf->SetXY(80 ,157);
            $pdf->Cell(0,0, $lettreDeRetrait->getNumOffre() , 0, 1,'C');
            
            //Ecrire sur le fichier
           // $pdf->Write( 8 , $lettreDeRetrait->getNumOffre());


            $pdf->Output('F', $newFile); 

            $lettreDeRetrait->setFichier("cahier_de_charge_".$lettreDeRetrait->getId().".pdf");
            $entityManager = $this->getDoctrine()->getManager();           
            $entityManager->persist($lettreDeRetrait);
            $entityManager->flush();
            
            return $this->redirectToRoute('lettre_de_retrait_index');
        }

        return $this->render('lettre_de_retrait/new.html.twig', [
            'lettre_de_retrait' => $lettreDeRetrait,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lettre_de_retrait_show", methods={"GET"})
     */
    public function show(LettreDeRetrait $lettreDeRetrait): Response
    {
        return $this->render('lettre_de_retrait/show.html.twig', [
            'lettre_de_retrait' => $lettreDeRetrait,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lettre_de_retrait_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LettreDeRetrait $lettreDeRetrait): Response
    {
        $form = $this->createForm(LettreDeRetraitType::class, $lettreDeRetrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lettre_de_retrait_index');
        }

        return $this->render('lettre_de_retrait/edit.html.twig', [
            'lettre_de_retrait' => $lettreDeRetrait,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lettre_de_retrait_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LettreDeRetrait $lettreDeRetrait): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lettreDeRetrait->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lettreDeRetrait);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lettre_de_retrait_index');
    }
}
