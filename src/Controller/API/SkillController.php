<?php


namespace App\Controller\API;


use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SkillController
 * @package App\Controller\API
 * @Route("/api/skills")
 */
class SkillController extends AbstractController
{
    /**
     * @param SkillRepository $skillRepository
     * @return JsonResponse
     * @Route("", methods={"GET"}, name="api_skills_collection_get")
     */
    public function collection(SkillRepository $skillRepository): JsonResponse
    {
        return $this->json($skillRepository->findAll());
    }
}