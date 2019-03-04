<?php

// src/Controller/LuckyController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Experience;
use App\Entity\Loisirs;
use App\Entity\Formation;
use App\Entity\Personnel;
use App\Entity\Competences;
use App\Entity\Realisations;
use App\Entity\Lv1;
use App\Entity\Lv2;
use App\Entity\Lv3;

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
        $number = rand(1, 6);

        $personnel = $this->getDoctrine()
            ->getRepository(Personnel::class)->find(1);

        if (!$personnel) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $lv1 = $this->getDoctrine()
            ->getRepository(Lv1::class)->find(1);

        if (!$lv1) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $lv2 = $this->getDoctrine()
            ->getRepository(Lv2::class)->find(1);

        if (!$lv2) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $lv3 = $this->getDoctrine()
            ->getRepository(Lv3::class)->find(1);

        if (!$lv3) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $realisations = $this->getDoctrine()
            ->getRepository(Realisations::class)->find($number);

        if (!$realisations) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $competences = $this->getDoctrine()
            ->getRepository(Competences::class)->findAll();

        if (!$competences) {
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

        $loisirs = $this->getDoctrine()
            ->getRepository(Loisirs::class)->findAll();

        if (!$loisirs) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)->findAll();

        if (!$formations) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('sitepublic/mycv.html.twig', [
            'personnel' => $personnel,
            'loisirs' => $loisirs,
            'formations' => $formations,
            'experiences' => $experiences,
            'competences' => $competences,
            'realisations' => $realisations,
            'lv1' => $lv1,
            'lv2' => $lv2,
            'lv3' => $lv3,
        ]);
    }

    public function bd()
    {
        $datedebut = '24-01-2014';
        $datefin = '24-02-2014';

        $exp = new Experience();
        $exp->setTitle('Boulangerie');
        $exp->setdatedebut(\DateTime::createFromFormat('d-m-Y', $datedebut));
        $exp->setdatefin(\DateTime::createFromFormat('d-m-Y', $datefin));
        $eManager = $this->getDoctrine()->getManager();
        $eManager->persist($exp);
        $eManager->flush();

        return $this->redirectToRoute('app_lucky_number');
    }
}
