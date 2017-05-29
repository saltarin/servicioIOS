<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations\View;

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
}
