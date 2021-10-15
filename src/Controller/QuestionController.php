<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('question/homepage.html.twig');
//        return new Response("koki super kontroleri as sukuriau");
    }

    /**
     * @Route("/question/{slug}", name="app_question_show");
     */
    public function show($slug)
    {

        $answers = [
            'Make sure your cat is sitting perrfectly still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        dump($slug, $this);
        return $this->render('question/show.html.twig',[
            'question'=> ucwords(str_replace('-', ' ',$slug)),
            'answers' => $answers]);
//        return new Response(sprintf('future page to show question :%s" !',ucwords(str_replace('-', ' ',$slug)) ));
    }
}