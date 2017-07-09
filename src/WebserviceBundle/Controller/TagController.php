<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

use WebserviceBundle\Entity\Tag;
use WebserviceBundle\Entity\Oferta;

class TagController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \array
     * @Rest\Post()
     */
    public function postTagAction(Request $request){

        $descripcion = $request->get('descripcion');
        $oferta_id = $request->get('oferta');

        $oferta_old = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Oferta')
                        ->find($oferta_id);
        
        $tag_old = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Tag')
                        ->findOneBy(array('descripcion' => $descripcion));

        if($oferta_old == null){
            
            return array('code' => Response::HTTP_NOT_FOUND, 'response' => 'oferta not exists you dumb fuck');
        }

        if($tag_old != null){

            $exists = false;
            $ofert_actual = null;
            foreach($tag_old->getOfertas() as $ofert){
                if( $ofert->getId() == $oferta_old->getId() ){

                    $exists = true;
                    $ofert_actual = $ofert;
                    break;
                }
            }

            if(!$exists){
                $ofert_actual->getTags()->add($tag_old);
                $this->getDoctrine()->getEntityManager()->flush();
                return(array('code' => Response::HTTP_OK, 'tag' => $tag_old));
            }
            return(array('code' => Response::HTTP_OK, 'tag' => $tag_old));
        }

        $tag = new Tag();
        $tag->setDescripcion($descripcion);
        $oferta_old->getTags()->add($tag);
        $this->getDoctrine()->getEntityManager()->persist($tag);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('tag' => $tag,'code' => Response::HTTP_OK);
        
    }

    /**
     * @return array
     * @Rest\View()
     */
    public function getTagsAction(){
        
        $tags = $this->getDoctrine()
            ->getRepository('WebserviceBundle:Tag')
            ->findAll();
        if($tags === null){

            return array('response' => "Sin resultados", Response::HTTP_NOT_FOUND);
        }
        return array('tags' => $tags, 'code' => Response::HTTP_OK);
    }
}
