<?php

namespace WebserviceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WebserviceBundle\Entity\Categoria;

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

        $manager->persist($computo);
        $manager->persist($vestidos);
        $manager->persist($restaurantes);

        $manager->flush();
    }
}