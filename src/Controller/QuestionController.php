<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
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

        $answers = [
            'Make sure your cat is sitting perrfectly still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];
        return $this->render('question/show.html.twig',[
            'question'=> ucwords(str_replace('-', ' ',$slug)),
            'answers' => $answers]);
//        return new Response(sprintf('future page to show question :%s" !',ucwords(str_replace('-', ' ',$slug)) ));
    }
}