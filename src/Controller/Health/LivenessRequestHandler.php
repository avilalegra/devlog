<?php

declare(strict_types=1);

namespace App\Controller\Health;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/health/liveness', name: 'health_liveness', methods: ['GET'])]
final class LivenessRequestHandler
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['status' => 'ok']);
    }
}
