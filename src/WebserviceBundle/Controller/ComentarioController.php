<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use \WebserviceBundle\Entity\Comentario;
use \WebserviceBundle\Entity\Oferta;
use \WebserviceBundle\Entity\Usuario;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

class ComentarioController extends FOSRestController
{
    /**
     * @param \Oferta $oferta
     * @return \array
     * @Rest\View()
     * @ParamConverter(name = "oferta", class= "WebserviceBundle:Oferta")
     */
    public function getComentariosAction(Oferta $oferta){

        if($oferta == null){

            return array('result' => 'no comentarios for oferta','code'=> Response::HTTP_NOT_FOUND);
        }
        
        $comentarios = $this->getDoctrine()
                        ->getRepository("WebserviceBundle:Comentario")
                        ->findBy(array('oferta' => $oferta,'referencia' => null));
        
        if($comentarios == null){

            return array('result' => 'no comentarios found', 'code' => Response::HTTP_NOT_FOUND);
        }

        return array('comentarios' => $comentarios, 'code' => Response::HTTP_OK);
    }
}
