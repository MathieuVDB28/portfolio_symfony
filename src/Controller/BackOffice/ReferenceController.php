<?php


namespace App\Controller\BackOffice;


use App\Entity\Reference;
use App\Form\ReferenceType;
use App\Repository\ReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class referenceController
 * @package App\Controller\BackOffice
 * @Route("/admin/references")
 */
class ReferenceController extends AbstractController
{
    /**
     * @param ReferenceRepository $referenceRepository
     * @return Response
     * @Route(name="references_manage")
     */
    public function manage(ReferenceRepository $referenceRepository): Response
    {
        $references = $referenceRepository->findAll();

        return $this->render("back_office/reference/manage.html.twig", [
            "references" => $references
        ]);
    }

    /**
     * @Route("/create", name="references_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $reference = new Reference();
        $form = $this->createForm(ReferenceType::class, $reference)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($reference);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Votre référence à été ajouté !");

            return $this->redirectToRoute("references_manage");
        }

        return $this->render("back_office/reference/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/update", name="references_update")
     * @param reference $reference
     * @param Request $request
     * @return Response
     */
    public function update(reference $reference, Request $request): Response
    {
        $form = $this->createForm(ReferenceType::class, $reference)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Votre référence à été modifiée !");

            return $this->redirectToRoute("reference_manage");
        }

        return $this->render("back_office/reference/update.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/delete", name="references_delete")
     * @param reference $reference
     * @return RedirectResponse
     */
    public function delete(reference $reference): RedirectResponse
    {
        $this->getDoctrine()->getManager()->remove($reference);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash("success", "Votre référence à été supprimée !");

        return $this->redirectToRoute("reference_manage");
    }
}