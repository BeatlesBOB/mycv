<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function number($name,$prename)
    {
        $number = random_int(0, 100);
        $nom ='Allard';
        $prenom ="Nathanael";
      
        return $this->render('sitepublic/mycv.html.twig', array(
            'number' => $number,
            'nom' => $nom,
            'prenom' => $prenom,
            'name' => $name,
            'prename' => $prename,
        ));
        
        
    }
    
    
    
   
}