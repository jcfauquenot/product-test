<?php

namespace App\Controller;

use App\Entity\Dejeuner;
use App\Form\DejeunerType;
use App\Repository\DejeunerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dejeuner")
 */
class DejeunerController extends AbstractController
{
    /**
     * @Route("/", name="dejeuner_index", methods={"GET"})
     */
    public function index(DejeunerRepository $dejeunerRepository): Response
    {
        return $this->render('dejeuner/index.html.twig', [
            'dejeuners' => $dejeunerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dejeuner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dejeuner = new Dejeuner();
        $form = $this->createForm(DejeunerType::class, $dejeuner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dejeuner);
            $entityManager->flush();

            return $this->redirectToRoute('dejeuner_index');
        }

        return $this->render('dejeuner/new.html.twig', [
            'dejeuner' => $dejeuner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dejeuner_show", methods={"GET"})
     */
    public function show(Dejeuner $dejeuner): Response
    {
        return $this->render('dejeuner/show.html.twig', [
            'dejeuner' => $dejeuner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dejeuner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dejeuner $dejeuner): Response
    {
        $form = $this->createForm(DejeunerType::class, $dejeuner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dejeuner_index');
        }

        return $this->render('dejeuner/edit.html.twig', [
            'dejeuner' => $dejeuner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dejeuner_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dejeuner $dejeuner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dejeuner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dejeuner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dejeuner_index');
    }
}
