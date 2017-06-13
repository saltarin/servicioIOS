<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use WebserviceBundle\Entity\Categoria;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;


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
        if($categorias === null){
            return new View("Sin resultados", Response::HTTP_NOT_FOUND);
        }
        
        return array('categorias' => $categorias);
    }


    /**
     * 
     * @param Categoria $categoria
     * @return \array
     * @Rest\View()
     * @ParamConverter(name="categoria", class="WebserviceBundle:Categoria")
     */
    public function getCategoriaAction(Categoria $categoria){

        if($categoria === null){
            return array('error' => "Categoria not exists", 'code' => Response::HTTP_NOT_FOUND);
        }
        
        return array('categoria' => $categoria);
    }

    /**
     * @param Request $request
     * @return \array
     * @Rest\Post()
     */
    public function postCategoriaAction(Request $request){

        $old_categoria = $this->getDoctrine()
            ->getRepository('WebserviceBundle:Categoria')
            ->findBy(array('descripcion' => $request->get('descripcion')));
        
        if($old_categoria !== null){
            return array('error' => 'categoria exist', 'code' => Response::HTTP_NOT_ACCEPTABLE);    
        }

        $categoria = new Categoria();
        $categoria->setDescripcion($request->get('descripcion'));
        $categoria->setEstado(1);
        $categoria->setFechaCreacion(new \DateTime());

        $this->getDoctrine()->getManager()->persist($categoria);
        $this->getDoctrine()->getManager()->flush();

        return array('categoria' => $categoria, 'code' => Response::HTTP_OK);
    }

    /**
     * @param Categoria $categoria
     * @param Request $request
     * @return \array
     * @Rest\Put()
     * @ParamConverter(name="categoria", class="WebserviceBundle:Categoria")
     */
    public function putCategoriaAction(Categoria $categoria,Request $request){

        
        if($categoria === null){
            return array('error' => 'categoria not exist', 'code' => Response::HTTP_NOT_ACCEPTABLE);    
        }
        
        $categoria->setDescripcion($request->get('Ndescripcion'));
        $categoria->setEstado($request->get('Nestado'));
        $categoria->setFechaCreacion($request->get('NfechaCreacion'));
        $this->getDoctrine()->getManager()->flush();

        return array('categoria' => $categoria, 'code' => Response::HTTP_OK);
    }

    
}