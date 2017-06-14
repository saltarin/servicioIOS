<?php

namespace WebserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \FOS\RestBundle\Controller\FOSRestController;
use WebserviceBundle\Entity\Usuario;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

class UsuarioController extends FOSRestController
{
    /**
     * @return array
     * @Rest\View()
     */
    public function getUsuariosAction(){

        $usuarios = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Usuario')
                        ->findAll();
        if($usuarios === null){

            return(array('response' => 'no users to show', 'code' => Response::HTTP_NOT_FOUND));
        }
        return array('usuarios' => $usuarios, 'code' => Response::HTTP_OK);
    }

    /**
     * @param Usuario $usuario
     * @return \array
     * @Rest\View()
     * @ParamConverter(name="usuario", class="WebserviceBundle:Usuario")
     */
    public function getUsuarioAction(Usuario $usuario){

        if($usuario === null){
            return array('response' => 'no user found', 'code' => Response::HTTP_NOT_FOUND);
        }

        return array('usuario' => $usuario,'code' => Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \array
     * @Rest\Post()
     */
    public function postUsuarioAction(Request $request){
        
        $old_usuario = $this->getDoctrine()
                        ->getRepository('WebserviceBundle:Usuario')
                        ->findBy(array('email' => $request->get('email')));
        
        if($old_usuario != null){

            return array('response' => 'usuario exists','code' => Response::HTTP_NOT_ACCEPTABLE);
        }

        $usuario = new Usuario();
        $usuario->setEmail($request->get('email'));
        $usuario->setPassword($request->get('password'));
        $usuario->setNombre($request->get('nombre'));
        $usuario->setApellidos($request->get('apellidos'));
        $usuario->setFechaNacimiento(new \DateTime($request->get('fechaNacimiento')));
        $usuario->setSexo($request->get('sexo'));

        //subir imagen
        #FALTA
        //  \file $request->files->get('img')

        $usuario->setAvatar('img/vapenation.jpg');

        $usuario->setEstado("HABILITADO");
        $usuario->setFechaRegistro(new \Datetime());

        $this->getDoctrine()->getEntityManager()->persist($usuario);
        $this->getDoctrine()->getEntityManager()->flush();

        return array('usuario' => $usuario,'code' => Response::HTTP_OK);
        
    }

    /**
     * @param int $id
     * @return \array
     * @Rest\Put()
     */
    public function putUsuarioAction($id, Request $request){

        $old_usuario = $this->getDoctrine()
                        ->getRepository("WebserviceBundle:Usuario")
                        ->find($id);

        if($old_usuario === null){

            return array('response' => 'user not found','code' => Response::HTTP_NOT_FOUND);
        }
        $old_usuario->setEmail($request->get('email'));
        $old_usuario->setPassword($request->get('password'));

        $old_usuario->setEmail($request->get('email'));
        $old_usuario->setPassword($request->get('password'));
        $old_usuario->setNombre($request->get('nombre'));
        $old_usuario->setApellidos($request->get('apellidos'));
        $old_usuario->setFechaNacimiento(new \DateTime($request->get('fechaNacimiento')));
        $old_usuario->setSexo($request->get('sexo'));

        //falta reemplazar img
        //$usuario->setAvatar($this->getRequest()->getUriFromPath('/img/vapenation.jpg'));

        $old_usuario->setEstado($request->get('estado'));
        $old_usuario->setFechaRegistro(new \Datetime($request->get('fechaRegistro')));

        $this->getDoctrine()->getEntityManager()->flush();
        
        return array('usuario' => $old_usuario,'code' => Response::HTTP_OK);
    }
    
}
