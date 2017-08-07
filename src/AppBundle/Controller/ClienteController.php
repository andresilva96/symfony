<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClienteController extends Controller
{
    /**
     * @Route("/rota/{nome}")
     */
    public function indexAction($nome){
        $nomes = [
            'andre',
            'teste',
            'kk eae men'
        ];

        return $this->render('cliente/index.html.twig', [
            'nome' => $nome,
            'nomes' => $nomes
        ]);
    }

    /**
     * @Route("/json")
     * @Method("GET")
     */
    public function apiAction(){
        $nomes = [
            'andre',
            'teste',
            'kk eae men'
        ];

        return new JsonResponse($nomes);
    }
}