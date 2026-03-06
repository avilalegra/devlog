<?php

declare(strict_types=1);

namespace App\Controller\Health;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/health/readiness', name: 'health_readiness', methods: ['GET'])]
final readonly class ReadinessRequestHandler
{
    public function __construct(private Connection $connection) {}

    public function __invoke(): JsonResponse
    {
        try {
            $this->connection->executeQuery('SELECT 1');
            return new JsonResponse(['status' => 'ok']);
        } catch (\Throwable) {
            return new JsonResponse(['status' => 'unavailable', 'detail' => 'database unreachable'], Response::HTTP_SERVICE_UNAVAILABLE);
        }
    }
}
