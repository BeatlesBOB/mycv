<?php

namespace App\Controller;

use App\Entity\Lv3;
use App\Form\Lv3Type;
use App\Repository\Lv3Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lv3")
 */
class Lv3Controller extends Controller
{
    /**
     * @Route("/", name="lv3_index", methods={"GET"})
     */
    public function index(Lv3Repository $lv3Repository): Response
    {
        return $this->render('lv3/index.html.twig', [
            'lv3s' => $lv3Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lv3_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lv3 = new Lv3();
        $form = $this->createForm(Lv3Type::class, $lv3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lv3);
            $entityManager->flush();

            return $this->redirectToRoute('lv3_index');
        }

        return $this->render('lv3/new.html.twig', [
            'lv3' => $lv3,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv3_show", methods={"GET"})
     */
    public function show(Lv3 $lv3): Response
    {
        return $this->render('lv3/show.html.twig', [
            'lv3' => $lv3,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lv3_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lv3 $lv3): Response
    {
        $form = $this->createForm(Lv3Type::class, $lv3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lv3_index', [
                'id' => $lv3->getId(),
            ]);
        }

        return $this->render('lv3/edit.html.twig', [
            'lv3' => $lv3,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv3_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lv3 $lv3): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lv3->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lv3);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lv3_index');
    }
}
