<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use WebserviceBundle\Entity\Categoria;

class CategoriaController extends Controller
{

    /**
     * @return array
     * @View()
     */
    public function getCategoriasAction(){
        
        $categorias = $this->getDoctrine()
            ->getRepository('AppRestWebserviceBundle:Categoria')
            ->findAll();
        return array('categorias' => $categorias);
    }


    /**
     * @param Categoria $categoria
     * @return array
     * @View()
     * @ParamConverter("categoria", class="WebserviceBundle:Categoria")
     */
    public function getCategoriaAction(Categoria $categoria){

        return array('categoria' => $categoria);
    }
}