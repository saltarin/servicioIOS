<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use WebserviceBundle\Entity\Categoria;


class CategoriaController extends FOSRestController
{

    /**
     * @return array
     * @Rest\View()
     */
    public function getCategoriasAction(){
        
        $categorias = $this->getDoctrine()
            ->getRepository('WebserviceBundle:Categoria')
            ->findAll();
        return array('categorias' => $categorias);
    }


    /**
     * 
     * @param Categoria $categoria
     * @return array
     * @Rest\View()
     * @ParamConverter("categoria", class="WebserviceBundle:Categoria")
     */
    public function getCategoriaAction(Categoria $categoria){

        if($categoria === null){
            return array('error' => "Categoria not exists");
        }
        $categorias = $this->getDoctrine->getRepository("WebserviceBundle:Categoria")
                        ->find($categoria);
        return array('categoria' => $categorias);
    }
}