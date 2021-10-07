<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("koki super kontroleri as sukuriau");
    }

    /**
     * @Route("/question/{slug}");
     */
    public function show($slug)
    {
        return new Response(sprintf('future page to show question :%s" !',ucwords(str_replace('-', ' ',$slug)) ));
    }
}