<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Experience;

// class LuckyController extends Controller
// {
//     public function number()
//     {
//         $number = random_int(0, 100);

//         return new Response(
//             '<html><body>Lucky number: '.$number.'</body></html>'
//         );
//     }
// }


class LuckyController extends Controller
{
    public function number()
    {
        $number = random_int(0, 100);
        $nom ='Allard';
        $prenom ="Nathanael";
      
        $experiences = $this->getDoctrine()
            ->getRepository(Experience::class)->findAll();
    
        if (!$experiences) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
      
        return $this->render('sitepublic/mycv.html.twig', array(
            'number' => $number,
            'nom' => $nom,
            'prenom' => $prenom,
            
            'experiences' => $experiences
        ));
    }

    public function bd()
    {
        $datedebut = "24-01-2014";
        $datefin = "24-02-2014";
        
        $exp = new Experience();
        $exp->setTitle('Boulangerie');
        $exp->setdatedebut(\DateTime::createFromFormat('d-m-Y', $datedebut));
        $exp->setdatefin(\DateTime::createFromFormat('d-m-Y', $datefin));
        $eManager=$this->getDoctrine()->getManager();
        $eManager->persist($exp);
        $eManager->flush();
        
        return $this->redirectToRoute('app_lucky_number');
    }
}
