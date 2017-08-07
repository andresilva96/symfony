<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    /**
     * @Route("/")
     */
    public function listarAction(){
        $em = $this->getDoctrine()->getManager();
        $repCliente = $em->getRepository(Cliente::class);
        $clientes = $repCliente->findAll();

        return $this->render('cliente/lista.html.twig', [
            'nomes' => $clientes
        ]);
    }

    /**
     * @Route("/remover/{id}")
     * @Method("GET")
     */
    public function removerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repCliente = $em->getRepository(Cliente::class);
        if ($cliente = $repCliente->find($id)) {
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirect('/');
    }

    /**
     * @Route("/adicionar")
     * @Method({"GET","POST"})
     */
    public function adicionarAction(Request $request){
        if ($request->isMethod('POST')) {
            $cliente = new Cliente();

            $data = $request->request->all();
            $cliente->hidrator($data);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            return $this->redirect('/');
        }

        return $this->render('cliente/adicionar.html.twig');
    }


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