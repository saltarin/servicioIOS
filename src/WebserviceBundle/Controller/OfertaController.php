<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use WebserviceBundle\Entity\Oferta;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use \WebserviceBundle\Entity\Categoria;
use \WebserviceBundle\Entity\Captura;
use \Doctrine\Common\Collections\ArrayCollection;

class OfertaController extends FOSRestController
{

    /**
     * @return array
     * @Rest\View()
     */
    public function getOfertasAction(){

        $ofertas = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Oferta')
                        ->findAll();
        if($ofertas === null){

            return(array('response' => 'no ofertas to show', 'code' => Response::HTTP_NOT_FOUND));
        }
        return array('ofertas' => $ofertas, 'code' => Response::HTTP_OK);
    }

    /**
     * @param Oferta $oferta
     * @return \array
     * @Rest\View()
     * @ParamConverter(name="oferta", class="WebserviceBundle:Oferta")
     */
    public function getOfertaAction(Oferta $oferta){

        if($oferta === null){
            return array('response' => 'no oferta found', 'code' => Response::HTTP_NOT_FOUND);
        }

        return array('oferta' => $oferta,'code' => Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \array
     * @Rest\Post()
     */
    public function postOfertaAction(Request $request){

        /*
        $old_oferta = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Oferta')
                        ->find($request->get('id'));
        
        if($old_oferta != null){

            return array('response' => 'Oferta exists','code' => Response::HTTP_NOT_ACCEPTABLE);
        }
        */

        $oferta = new Oferta();
        $oferta->setTitulo($request->get('titulo'));
        $oferta->setDescripcion($request->get('descripcion'));
        $oferta->setPrecio($request->get('precio'));
        $oferta->setDescuento($request->get('descuento'));
        $oferta->setTipoOferta($request->get('tipoOferta'));
        $oferta->setPosX($request->get('posx'));
        $oferta->setPosY($request->get('posy'));

        //id categoria
        $categoria =  $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Categoria')
                        ->find($request->get('categoria'));
        
        //leer capturas for
            #FALTA
        //  \file $request->files->get('img')

        $captura1 = new Captura();
        $captura1->setUrl('img/vapenation.jpg');
        $oferta->getCapturas()->add($captura1);
        $this->getDoctrine()->getEntityManager()->persist($captura1);

        $captura2 = new Captura();
        $captura2->setUrl('img/vapenation.jpg');
        $oferta->getCapturas()->add($captura2);
        $this->getDoctrine()->getEntityManager()->persist($captura2);

        $captura3 = new Captura();
        $captura3->setUrl('img/vapenation.jpg');
        $oferta->getCapturas()->add($captura3);
        $this->getDoctrine()->getEntityManager()->persist($captura3);

        //id usuario
        $usuario = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Usuario')
                        ->find($request->get('usuario'));

        $oferta->setCategoria($categoria);
        $oferta->setUsuario($usuario);

        $oferta->setEstado(1);
        $oferta->setFechaCreacion(new \Datetime());

        $this->getDoctrine()->getEntityManager()->persist($oferta);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('oferta' => $oferta,'code' => Response::HTTP_OK);
        
    }

    /**
     * @param int $id
     * @return \array
     * @Rest\Put()
     */
    public function putOfertaAction($id, Request $request){
    
        $old_oferta = $this->getDoctrine()
                        ->getRepository("WebserviceBundle:Oferta")
                        ->find($id);

        if($old_oferta == null){

            return array('response' => 'oferta not found','code' => Response::HTTP_NOT_FOUND);
        }

        $old_oferta->setTitulo($request->get('titulo'));
        $old_oferta->setDescripcion($request->get('descripcion'));
        $old_oferta->setPrecio($request->get('precio'));
        $old_oferta->setDescuento($request->get('descuento'));
        $old_oferta->setTipoOferta($request->get('tipoOferta'));
        $old_oferta->setPosX($request->get('posx'));
        $old_oferta->setPosY($request->get('posy'));

        //id categoria
        $categoria =  $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Categoria')
                        ->find((int)$request->get('categoria'));

        //id usuario
        $usuario = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Usuario')
                        ->find((int)$request->get('usuario'));

        //falta tags

        //falta reemplazar img
        //$oferta->setAvatar($this->getRequest()->getUriFromPath('/img/vapenation.jpg'));
        
        $old_oferta->setEstado((int)$request->get('estado'));
        $old_oferta->setFechaCreacion(new \Datetime($request->get('fechaRegistro')));

        $this->getDoctrine()->getEntityManager()->flush();
        
        return array('oferta' => $old_oferta,'code' => Response::HTTP_OK);
    }
}
