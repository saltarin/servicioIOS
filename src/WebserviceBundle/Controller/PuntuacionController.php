<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

use \WebserviceBundle\Entity\PuntuacionOferta;
use WebserviceBundle\Entity\Usuario;
use WebserviceBundle\Entity\Oferta;

class PuntuacionController extends FOSRestController
{
    /**
     * @param Request
     * @return array
     * @Rest\Post()
     */
    public function upvotePuntuacionAction(Request $request){

        $id_oferta = $request->get('oferta');
        $id_usuario = $request->get('usuario');

        $usuario = $this->getDoctrine()->getRepository('WebserviceBundle:Usuario')->find($id_usuario);
        $oferta = $this->getDoctrine()->getRepository('WebserviceBundle:Oferta')->find($id_oferta);

        if($usuario == null || $oferta == null){

            return array('response' => 'data not found', 'code' => Response::HTTP_NOT_FOUND);
        }

        //if not exists? -> gg

        $puntuacion_old = $this->getDoctrine()
                            ->getRepository('WebserviceBundle:PuntuacionOferta')
                            ->findOneBy(array('usuario' => $usuario));

        //if user registered? -> nothing happen
        if($puntuacion_old != null){
            
            $puntuacion_old->setPuntuacion(1);
            $this->getDoctrine()->getEntityManager()->flush();
            return array('puntuacionOferta' => $puntuacion_old, 'code' => Response::HTTP_OK);
        }

        $puntuacion = new PuntuacionOferta();
        $puntuacion->setOferta($oferta);
        $puntuacion->setUsuario($usuario);
        $puntuacion->setPuntuacion(1);

        $this->getDoctrine()->getEntityManager()->persist($puntuacion);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('puntuacionOferta' => $puntuacion, 'code' => Response::HTTP_OK);
    }

     /**
     * @param Request
     * @return array
     * @Rest\Post()
     */
    public function downvotePuntuacionAction(Request $request){

        $id_oferta = $request->get('oferta');
        $id_usuario = $request->get('usuario');

        $usuario = $this->getDoctrine()->getRepository('WebserviceBundle:Usuario')->find($id_usuario);
        $oferta = $this->getDoctrine()->getRepository('WebserviceBundle:Oferta')->find($id_oferta);

        if($usuario == null || $oferta == null){

            return array('response' => 'data not found', 'code' => Response::HTTP_NOT_FOUND);
        }

        //if not exists? -> gg

        $puntuacion_old = $this->getDoctrine()
                            ->getRepository('WebserviceBundle:PuntuacionOferta')
                            ->findOneBy(array('usuario' => $usuario));

        //if user registered? -> nothing happen
        if($puntuacion_old != null){

            $puntuacion_old->setPuntuacion(-1);
            $this->getDoctrine()->getEntityManager()->flush();
            return array('puntuacionOferta' => $puntuacion_old, 'code' => Response::HTTP_OK);
        }

        $puntuacion = new PuntuacionOferta();
        $puntuacion->setOferta($oferta);
        $puntuacion->setUsuario($usuario);
        $puntuacion->setPuntuacion(-1);

        $this->getDoctrine()->getEntityManager()->persist($puntuacion);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('puntuacionOferta' => $puntuacion, 'code' => Response::HTTP_OK);
    }
}
