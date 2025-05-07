<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    #[Route('/hello', name: 'hello')]
    public function __invoke(): Response
    {
        return new Response('Hello Symfony DDD!');
    }
}
