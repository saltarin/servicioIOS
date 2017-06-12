<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WebserviceBundle\Entity\Usuario;
use WebserviceBundle\Entity\Oferta;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\ComentarioRepository")
 */
class Comentario
{
    public function __construct(){

        $this->comentarios = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var Usuario
     * @ORM\ManyToOne(targetEntity = "Usuario", inversedBy = "comentarios")
     * @ORM\JoinColumn(name = "usuario_id",referencedColumnName = "id")
     */
    private $usuario;

    /**
     * @var Oferta
     * @ORM\ManyToOne(targetEntity = "oferta", inversedBy = "comentarios")
     * @ORM\JoinColumn(name = "oferta_id",referencedColumnName = "id")
     */
    private $oferta;


    /**
     * @var Comentario
     * @ORM\ManyToOne(targetEntity = "Comentario", inversedBy = "comentarios")
     * @ORM\JoinColumn(name = "referencia_id", referencedColumnName = "id")
     */
    private $referencia;

    /**
     * @var \array Comentario
     * @ORM\OneToMany(targetEntity = "Comentario", mappedBy = "referencia")
     */
    private $comentarios;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=500)
     */
    private $mensaje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaRegistro", type="datetime")
     */
    private $fechaRegistro;

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;


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
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Comentario
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Comentario
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Comentario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return int
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @return Comentario
     */
    public function getReferencia(){

        return $this->referencia;
    }

    /**
     * @param Comentario $referencia
     * @return Comentario
     */
    public function setReferencia(Comentario $referencia){

        $this->referencia = $referencia;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario(){

        return $this->usuario;
    }

    /** 
     * @param Usuario $usuario
     * @return Comentario
    */
    public function setUsuario($usuario){

        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return Oferta
     */
    public function getOferta(){

        return $this->oferta;
    }

    /** 
     * @param Oferta $oferta
     * @return Comentario
    */
    public function setOferta($oferta){

        $this->oferta = $oferta;
        return $this;
    }
}

