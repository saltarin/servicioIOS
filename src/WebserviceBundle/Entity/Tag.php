<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\TagRepository")
 */
class Tag
{
    public function __construct(){

        $this->ofertas = new ArrayCollection();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, unique=true)
     */
    private $descripcion;

    /**
     * @var Oferta
     * @ORM\ManyToMany(targetEntity="Oferta", mappedBy="tags")
     */
    private $ofertas;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Tag
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get ofertas
     * @return \array Oferta
     */
    public function getOfertas(){

        return $this->ofertas;
    }

    /**
     * Set ofertas
     * @param \array Oferta
     * @return Categoria
     */
    public function setOfertas(Oferta $ofertas){

        $this->ofertas = $ofertas;
        return $this;
    }
}

