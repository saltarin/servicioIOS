<?php

namespace WebserviceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

use WebserviceBundle\Entity\Tag;
use WebserviceBundle\Entity\Oferta;
use WebserviceBundle\Entity\Categoria;
use WebserviceBundle\Entity\Usuario;
use WebserviceBundle\Entity\PuntuacionOferta;
use WebserviceBundle\Entity\Comentario;
use WebserviceBundle\Entity\Captura;

class LoadData implements FixtureInterface{


    public function load(ObjectManager $manager){

        $computo = new Categoria();
        $computo->setDescripcion("Computo");
        $computo->setEstado(1);
        $computo->setFechaCreacion(new \DateTime());

        $vestidos = new Categoria();
        $vestidos->setDescripcion("vestidos");
        $vestidos->setEstado(1);
        $vestidos->setFechaCreacion(new \DateTime());

        $restaurantes = new Categoria();
        $restaurantes->setDescripcion("restaurantes");
        $restaurantes->setEstado(1);
        $restaurantes->setFechaCreacion(new \DateTime());

        $usuario = new Usuario();
        $usuario->setEmail("kappa@ross.com");
        $usuario->setPassword("kappa");
        $usuario->setNombre("kappa");
        $usuario->setApellidos("ross");
        $usuario->setFechaRegistro(new \DateTime());
        $usuario->setFechaNacimiento(new \DateTime("2000-08-22"));
        $usuario->setEstado("HABILITADO");

        $tag1 = new Tag();
        $tag1->setDescripcion("Oferta");

        $tag2 = new Tag();
        $tag2->setDescripcion("Facebook");

        
        
        $oferta1 = new Oferta();
        $oferta1->setTitulo("Oferta 1");
        $oferta1->setDescripcion("Oferta oferta oferta");
        $oferta1->setPrecio(100.25);
        $oferta1->setTipoOferta("Ocasion");
        $oferta1->setFechaCreacion(new \DateTime());
        $oferta1->setPosX(-12.1222799);
        $oferta1->setPosY(-77.0283169);

        $oferta1->setEstado(1);
        $oferta1->setCategoria($restaurantes);
        $oferta1->setUsuario($usuario);

        $oferta1->getTags()->add($tag1);
        $oferta1->getTags()->add($tag2);

        $captura1 = new Captura();
        $captura1->setUrl("slxtltuko23mvqut6kvs");
        $captura1->setOferta($oferta1);

        $puntuacion1 = new PuntuacionOferta();
        $puntuacion1->setOferta($oferta1);
        $puntuacion1->setUsuario($usuario);
        $puntuacion1->setPuntuacion(1);

        $comentario_001 = new Comentario();
        $comentario_001->setMensaje("mas 10 papu");
        $comentario_001->setEstado(1);
        $comentario_001->setFechaRegistro(new \Datetime());
        $comentario_001->setUsuario($usuario);
        $comentario_001->setOferta($oferta1);

        $comentario_001_001 = new Comentario();
        $comentario_001_001->setMensaje("reportado despidete de tu cuenta");
        $comentario_001_001->setEstado(1);
        $comentario_001_001->setFechaRegistro(new \Datetime());
        $comentario_001_001->setUsuario($usuario);
        $comentario_001_001->setOferta($oferta1);
        $comentario_001_001->setReferencia($comentario_001);

        
        $manager->persist($tag1);
        $manager->persist($tag2);
        $manager->persist($computo);
        $manager->persist($vestidos);
        $manager->persist($restaurantes);
        $manager->persist($usuario);
        $manager->persist($oferta1);
        $manager->persist($captura1);
        $manager->persist($comentario_001);
        $manager->persist($comentario_001_001);
        $manager->persist($puntuacion1);

        $manager->flush();
    }
}