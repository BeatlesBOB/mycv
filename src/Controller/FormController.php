<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Loisirs;
use App\Form\LoisirsType;

class FormController extends AbstractController
{
    public function create()
    {
        $loisir = new Loisirs();
        $form = $this->createForm(LoisirsType::class, $loisir);
        return $this->render(
            'Loisir/create.html.twig',
            [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $loisir = $entityManager->getRepository(Loisirs::class)->findOneBy(['id' => $id]);
        $form = $this->createForm(LoisirsType::class, $loisir);
        return $this->render(
            'Loisir/create.html.twig',
            [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    public function remove($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $loisir=$eManager->getRepository(Loisirs::class)->findOneBy(['id' => $id]);
        $error=null;
        
        if ($loisir) {
            $eManager->remove($loisir);
            $eManager->flush();
        } else {
            $error="Vous ne sortez par de chez vous";
        }
        
        return $this->render(
            'error/error.html.twig',
            [
            'error' => $error,
            ]
        );
    }
    
    public function valid(Request $request)
    {
        $loisir = new Loisirs();
        $form = $this->createForm(LoisirsType::class, $loisir);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisir);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_lucky_number');
        }
    
        return $this->render(
            'Loisir/create.html.twig',
            [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
}
