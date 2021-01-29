<?php

namespace App\Controller;

use App\Entity\Record;
use App\Form\RecordType;
use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/record")
 */
class RecordController extends AbstractController
{
    /**
     * @Route("/", name="record_index", methods={"GET"})
     */
    public function index(RecordRepository $recordRepository): Response
    {
        return $this->render('record/index.html.twig', [
            'records' => $recordRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="record_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $record = new Record();
        $form = $this->createForm(RecordType::class, $record);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($record);
            $entityManager->flush();

            return $this->redirectToRoute('record_index');
        }

        return $this->render('record/new.html.twig', [
            'record' => $record,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="record_show", methods={"GET"})
     */
    public function show(Record $record): Response
    {
        return $this->render('record/show.html.twig', [
            'record' => $record,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="record_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Record $record): Response
    {
        $form = $this->createForm(RecordType::class, $record);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('record_index');
        }

        return $this->render('record/edit.html.twig', [
            'record' => $record,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="record_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Record $record): Response
    {
        if ($this->isCsrfTokenValid('delete'.$record->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($record);
            $entityManager->flush();
        }

        return $this->redirectToRoute('record_index');
    }
}
