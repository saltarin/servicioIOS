<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

use WebserviceBundle\Entity\Captura;
use WebserviceBundle\Entity\Oferta;

class CapturaController extends FOSRestController
{
    /**
     * @param Request $request
     * @return array
     * @Rest\Post()
     */
    public function findCapturaAction(Request $request){

        $id_oferta = $request->get('oferta');

        $oferta_old = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Oferta')
                        ->find($id_oferta);

        if($oferta_old == null){

            return array('code' => Response::HTTP_NOT_FOUND, 'response' => 'oferta not exists you fucking disgrace');
        }

        $capturas = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Captura')
                        ->findBy(array('oferta' => $oferta_old));

        if($capturas == null){
            
            return array('response' => "Sin resultados", Response::HTTP_NOT_FOUND);
        }
        
        return array('categorias' => $capturas, 'code' => Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return array
     * @Rest\Post()
     */
    public function postCapturaAction(Request $request){

        $oferta_id = $request->get('oferta');
        $url = $request->get('url');
        
        $oferta_old = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Oferta')
                        ->find($oferta_id);
        
        if($oferta_old == null){

            return array('code' => Response::HTTP_NOT_FOUND, 'response' => 'oferta not found you stupid ass');
        }

        $captura = new Captura();
        $captura->setUrl($url)->setOferta($oferta_old);
        $this->getDoctrine()->getEntityManager()->persist($captura);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('code' => Response::HTTP_OK, 'captura' => $captura);
    }
}
