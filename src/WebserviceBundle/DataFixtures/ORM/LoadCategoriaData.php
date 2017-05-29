<?php

namespace WebserviceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WebserviceBundle\Entity\Categoria;

class LoadCategoriaData extends FixtureInterface{


    public function load(ObjectManager $manager){

        $computo = new Categoria();
        $computo->setDescripcion("Computo");
        $computo->setEstado("habilitado");
        $computo->setFechaCreacion(date("Y-m-d h:i:sa"));

        $vestidos = new Categoria();
        $vestidos->setDescripcion("vestidos");
        $vestidos->setEstado("habilitado");
        $vestidos->setFechaCreacion(date("Y-m-d h:i:sa"));

        $manager->persist($computo);
        $manager->persist($vestidos);

        $manager->flush();
    }
}