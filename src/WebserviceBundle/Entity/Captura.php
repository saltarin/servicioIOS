<?php

namespace WebserviceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Captura
 *
 * @ORM\Table(name="captura")
 * @ORM\Entity(repositoryClass="WebserviceBundle\Repository\CapturaRepository")
 */
class Captura
{
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
     * @ORM\Column(name="url", type="string", length=200)
     */
    private $url;

    /**
     * @var Oferta
     * @ORM\ManyToOne(targetEntity="Oferta", inversedBy="capturas")
     * @ORM\JoinColumn(name="oferta_id", referencedColumnName="id")
     */
    private $oferta;


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
     * Set url
     *
     * @param string $url
     *
     * @return Captura
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Oferta
     */
    public function getOferta(){

        return $this->oferta;
    }

    /**
     * @param Oferta $oferta
     * @return Captura
     */
    public function setOferta($oferta){

        $this->oferta = $oferta;
        return $this;
    }
}

