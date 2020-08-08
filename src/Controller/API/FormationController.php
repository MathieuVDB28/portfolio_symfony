<?php


namespace App\Controller\API;


use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationController
 * @package App\Controller\API
 * @Route("/api/formation")
 */
class FormationController extends AbstractController
{
    /**
     * @param FormationRepository $FormationRepository
     * @return JsonResponse
     * @Route("", methods={"GET"}, name="api_formation_collection_get")
     */
    public function collection(FormationRepository $FormationRepository): JsonResponse
    {
        return $this->json($FormationRepository->findAll());
    }
}