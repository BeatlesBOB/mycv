<?php

namespace App\Controller;

use App\Entity\Lv2;
use App\Form\Lv2Type;
use App\Repository\Lv2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lv2")
 */
class Lv2Controller extends Controller
{
    /**
     * @Route("/", name="lv2_index", methods={"GET"})
     */
    public function index(Lv2Repository $lv2Repository): Response
    {
        return $this->render('lv2/index.html.twig', [
            'lv2s' => $lv2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lv2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lv2 = new Lv2();
        $form = $this->createForm(Lv2Type::class, $lv2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lv2);
            $entityManager->flush();

            return $this->redirectToRoute('lv2_index');
        }

        return $this->render('lv2/new.html.twig', [
            'lv2' => $lv2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv2_show", methods={"GET"})
     */
    public function show(Lv2 $lv2): Response
    {
        return $this->render('lv2/show.html.twig', [
            'lv2' => $lv2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lv2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lv2 $lv2): Response
    {
        $form = $this->createForm(Lv2Type::class, $lv2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lv2_index', [
                'id' => $lv2->getId(),
            ]);
        }

        return $this->render('lv2/edit.html.twig', [
            'lv2' => $lv2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lv2_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lv2 $lv2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lv2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lv2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lv2_index');
    }
}
