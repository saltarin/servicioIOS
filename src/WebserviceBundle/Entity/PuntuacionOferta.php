<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PuntuacionOferta
 *
 * @ORM\Table(name="puntuacion_oferta")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\PuntuacionOfertaRepository")
 */
class PuntuacionOferta
{
    /**
     * @var Oferta
     *
     * @ORM\Column(name="oferta_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Oferta", inversedBy ="puntuacionOfertas")
     * @ORM\JoinColumn(name="oferta_id",referencedColumnName="id")
     */
    private $oferta;

    /**
     * @var Usuario
     *
     * @ORM\Column(name="usuario_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy ="puntuacionOfertas")
     * @ORM\JoinColumn(name="usuario_id",referencedColumnName="id")
     */
    private $usuario;


    /**
     * @var int
     *
     * @ORM\Column(name="puntuacion", type="integer")
     */
    private $puntuacion;

    /**
     * @return Oferta
     */
    public function getOferta(){

        return $this->oferta;
    }

    /**
     * @param Oferta $oferta
     * @return PuntuacionOferta
     */
    public function setOferta($oferta){

        $this->oferta = $oferta;
        return $this;
    }   

    /**
     * @return Usuario
     * 
     */
    public function getUsuario(){

        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return PuntuacionOferta
     */
    public function setUsuario($usuario){

        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Set puntuacion
     *
     * @param integer $puntuacion
     *
     * @return PuntuacionOferta
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get puntuacion
     *
     * @return int
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }
}

