<?php

namespace WebserviceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

use WebserviceBundle\Entity\Oferta;
use WebserviceBundle\Entity\Categoria;
use WebserviceBundle\Entity\Usuario;
use WebserviceBundle\Entity\PuntuacionOferta;

class LoadCategoriaData implements FixtureInterface{


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
        $usuario->setFechaNacimiento(new \DateTime());
        $usuario->setEstado("HABILITADO");
        
        $oferta1 = new Oferta();
        $oferta1->setTitulo("Oferta 1");
        $oferta1->setDescripcion("Oferta oferta oferta");
        $oferta1->setPrecio(100.25);
        $oferta1->setTipoOferta("Ocasion");
        $oferta1->setFechaCreacion(new \DateTime());
        $oferta1->setEstado(1);
        $oferta1->setCategoria($restaurantes);
        $oferta1->setUsuario($usuario);

        $puntuacion1 = new PuntuacionOferta();
        $puntuacion1->setOferta($oferta1);
        $puntuacion1->setUsuario($usuario);
        $puntuacion1->setPuntuacion(1);
        
        
        $manager->persist($computo);
        $manager->persist($vestidos);
        $manager->persist($restaurantes);
        $manager->persist($usuario);
        $manager->persist($oferta1);
        $manager->persist($puntuacion1);

        $manager->flush();
    }
}