<?php

namespace App\Controller;

use App\Entity\Lv1;
use App\Form\Lv1Type;
use App\Repository\Lv1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lv1")
 */
class Lv1Controller extends Controller
{
    /**
     * @Route("/", name="lv1_index", methods={"GET"})
     */
    public function index(Lv1Repository $lv1Repository): Response
    {
        return $this->render('lv1/index.html.twig', [
            'lv1s' => $lv1Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lv1_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lv1 = new Lv1();
        $form = $this->createForm(Lv1Type::class, $lv1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lv1);
            $entityManager->flush();

            return $this->redirectToRoute('lv1_index');
        }

        return $this->render('lv1/new.html.twig', [
            'lv1' => $lv1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv1_show", methods={"GET"})
     */
    public function show(Lv1 $lv1): Response
    {
        return $this->render('lv1/show.html.twig', [
            'lv1' => $lv1,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lv1_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lv1 $lv1): Response
    {
        $form = $this->createForm(Lv1Type::class, $lv1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lv1_index', [
                'id' => $lv1->getId(),
            ]);
        }

        return $this->render('lv1/edit.html.twig', [
            'lv1' => $lv1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv1_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lv1 $lv1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lv1->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lv1);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lv1_index');
    }
}
