<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    public function __construct(){
        
        $this->ofertas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->puntuacionOfertas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=255, nullable=true)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaRegistro", type="date")
     */
    private $fechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=100)
     */
    private $estado;

    /**
     * @var \array Oferta
     * @ORM\OneToMany( targetEntity = "Oferta" , mappedBy = "usuario")
     */
    private $ofertas;

    /**
     * @var \array PuntuacionOferta
     * @ORM\OneToMany(targetEntity = "PuntuacionOferta",mappedBy = "usuario")
     */
    private $puntuacionOfertas;

    /**
     * @var \array Comentario
     * @ORM\OneToMany(targetEntity = "Comentario",mappedBy = "usuario")
     */
    private $comentarios;


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
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Usuario
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Usuario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Usuario
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Usuario
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
     * @param string $estado
     *
     * @return Usuario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param \array Oferta
     * @return Usuario
     */
    public function setOfertas($ofertas){
        
        $this->ofertas = $ofertas;
        return $this;
    }

    /**
     * @return \array Oferta
     */
    public function getOfertas(){
        
        return $this->ofertas;
    }

    /**
     * @param \array PuntuacionOferta
     * @return Usuario
     */
    public function setPuntiacionOfertas($puntuacionOfertas){

        $this->puntuacionOfertas = $puntuacionOfertas;
        return $this;
    }

    /**
     * @return \array PuntuacionOferta
     */
    public function getPuntuacionOfertas(){
        
        return $this->puntuacionOfertas;
    }

    /**
     * @param \array Comentario
     * @return Usuario
     */
    public function setComentarios($comentarios){

        $this->comentarios = $comentarios;
        return $this;
    }

    /**
     * @return \array Comentario
     */
    public function getComentarios(){
        
        return $this;
    }

}

