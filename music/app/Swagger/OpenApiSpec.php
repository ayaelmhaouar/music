<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Music API",
    description: "Documentation de l'API Musicbox",
    contact: new OA\Contact(
        name: "Ayaah Mhaouar",
        email: "ayaah@example.com"
    )
)]
#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Serveur local"
)]
class OpenApiSpec
{
    // Cette classe sert uniquement à définir les informations globales de l'API
}
