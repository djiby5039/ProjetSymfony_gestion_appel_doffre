<?php

namespace App\Service;

use App\Entity\LettreDeRetrait;
use setasign\Fpdi\Fpdi ;


Class FichierLettreDeRetait{

    public function new(LettreDeRetrait $lettreDeRetrait)
    {
        $file =  "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/documents/cahier_de_charge.pdf";
            
            $newFile = "C:\Users\Djiby sow\Desktop/2IRIS/2iris\public/documents/cahier_de_charge_".$lettreDeRetrait->getId().".pdf";
            
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
            $pdf->useTemplate($tplId , 10 , 10, 200 );
            //pour la gestion du font
            $pdf->SetFont ('Helvetica');


            //pour la gestion de la position du date et le lieu
            $pdf->SetXY(150 ,150);
            //Ecrire sur le fichier
            $pdf->Write( 8 , $lettreDeRetrait->getLieu(). ' le '. $lettreDeRetrait->getDate()->format('d M Y'));

            //pour la gestion de la position du destinataire
            $pdf->SetXY(15 ,15);
            //Ecrire sur le fichier
            $pdf->Write( 8 , $lettreDeRetrait->getDestinataire());

            //pour la gestion de la position de l'adresse
            $pdf->SetXY(50 ,35);
            //Ecrire sur le fichier
            $pdf->Write( 8 , $lettreDeRetrait->getAdrDesti());

            //pour la gestion de la position de la reference
            $pdf->SetXY(32 ,40);
            //$pdf->Cell(80);
            //Ecrire sur le fichier
            $pdf->Write( 8 , utf8_encode( $lettreDeRetrait->getReference()));

            //pour la gestion de la position du numero d'appel d'offre
            $pdf->SetXY(15 ,10);
            //Ecrire sur le fichier
            $pdf->Write( 8 , $lettreDeRetrait->getNumOffre());


            $pdf->Output('F', $newFile); 

            $lettreDeRetrait->setFichier("cahier_de_charge_".$lettreDeRetrait->getId().".pdf");
            $entityManager = $this->getDoctrine()->getManager();           
            $entityManager->persist($lettreDeRetrait);
            $entityManager->flush();
    }

}
?>