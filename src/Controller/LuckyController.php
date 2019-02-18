<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Experience;
use App\Entity\Loisirs;
use App\Entity\Formation;
use App\Entity\Personnel;
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
        
        $personnel = $this->getDoctrine()
            ->getRepository(Personnel::class)->find(1);
    
        if (!$personnel) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        
      
        $experiences = $this->getDoctrine()
            ->getRepository(Experience::class)->findAll();
    
        if (!$experiences) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        
        $loisirs= $this->getDoctrine()
            ->getRepository(Loisirs::class)->findAll();
    
        if (!$loisirs) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        
        $formations= $this->getDoctrine()
            ->getRepository(Formation::class)->findAll();
    
        if (!$formations) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
      
        return $this->render('sitepublic/mycv.html.twig', array(
            'number' => $number,
            'personnel' => $personnel,
            'loisirs' => $loisirs,
            'formations' => $formations,
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
