<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Oferta
 *
 * @ORM\Table(name="oferta")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\OfertaRepository")
 */
class Oferta
{
    public function __construct(){

        $this->tags = new ArrayCollection();
        $this->capturas = new ArrayCollection();
        $this->puntuacionOfertas = new ArrayCollection();
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="descuento", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $descuento;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoOferta", type="string", length=255)
     */
    private $tipoOferta;

    /**
     * @var string
     *
     * @ORM\Column(name="posX", type="decimal", precision=10, scale=6, nullable=true)
     */
    private $posX;

    /**
     * @var string
     *
     * @ORM\Column(name="posY", type="decimal", precision=10, scale=6, nullable=true)
     */
    private $posY;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;

    /**
     * @var Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy ="ofertas")
     * @ORM\JoinColumn(name="categoria_id",referencedColumnName="id")
     */
    private $categoria;

    /**
     * @var \array PuntuacionOferta
     * @ORM\OneToMany(targetEntity = "PuntuacionOferta",mappedBy = "oferta")
     */
    private $puntuacionOfertas;

    /**
     * @var \array Captura
     * 
     * @ORM\OneToMany(targetEntity = "Captura", mappedBy = "oferta")
     */
    private $capturas;

    /**
     * @var \array Tag
     * @ORM\ManyToMany(targetEntity="Tag",mappedBy="ofertas")
     */
    private $tags;

    /**
     * @var \array Usuario
     * @ORM\ManyToOne(targetEntity= "Usuario", inversedBy = "ofertas")
     * @ORM\JoinColumn(name= "usuario_id", referencedColumnName= "id")
     */
    private $usuario;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Oferta
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Oferta
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
     * Set precio
     *
     * @param string $precio
     *
     * @return Oferta
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descuento
     *
     * @param string $descuento
     *
     * @return Oferta
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return string
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set tipoOferta
     *
     * @param string $tipoOferta
     *
     * @return Oferta
     */
    public function setTipoOferta($tipoOferta)
    {
        $this->tipoOferta = $tipoOferta;

        return $this;
    }

    /**
     * Get tipoOferta
     *
     * @return string
     */
    public function getTipoOferta()
    {
        return $this->tipoOferta;
    }

    /**
     * Set posX
     *
     * @param string $posX
     *
     * @return Oferta
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get posX
     *
     * @return string
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param string $posY
     *
     * @return Oferta
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }

    /**
     * Get posY
     *
     * @return string
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Oferta
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Oferta
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
     * Set categoria
     *
     * @param \Categoria $categoria
     *
     * @return Oferta
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @return \array Tag
     */
    public function getTags(){

        return $this->tags;
    }

    /**
     * @param \array Tag
     * @return Oferta
     */
    public function setTags($tags){

        $this->tags = $tags;
        return $this;
    }


    /**
     * @return \array Captura
     */
    public function getCapturas(){

        return $this->capturas;
    }

    /**
     * @param \array Captura
     * @return Oferta
     */
    public function setCapturas($capturas){

        $this->capturas = $capturas;
        return $this;
    }

    /**
     * @return \array Usuario
     */
    public function getUsuario(){

        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return Oferta
     */
    public function setUsuario($usuario){

        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return \array PuntuacionOferta
     */
    public function getPuntuacionOfertas(){

        return $this->puntuacionOfertas;
    }

    /**
     * @param \array PuntuacionOferta
     * @return Oferta
     */
    public function setPuntuacionOfertas($puntuacionOfertas){

        $this->puntuacionOfertas = $puntuacionOfertas;
        return $this;
    }
}

