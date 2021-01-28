<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReponseoffredappelRepository;

class StatistiqueController extends AbstractController
{
    /**
     * @Route("/statistique", name="statistique")
     */
    public function index(ReponseoffredappelRepository $statis)
    {   
        //on recupere tous 
        $statistic = $statis->findAll();

        $nom_entreprise = []; 
        $offre_financier = [];
        $color = [];
        $type_diagramme = [];

        foreach( $statistic as $sta){
                 
               $nom_entreprise[] = $sta->getNomEntreprise();
               $offre_financier[] = $sta->getOffreFinancier();
               $color[] = $sta->getColor();
               $type_diagramme[] = $sta->getTypeDiagramme();
        }

        return $this->render('statistique/index.html.twig', [
            
            'nom_entreprise'=>json_encode($nom_entreprise),
            'offre_financier'=>json_encode($offre_financier),
            'color'=>json_encode($color),
            'type_diagramme'=>json_encode($type_diagramme)
        ]);
    }
}
