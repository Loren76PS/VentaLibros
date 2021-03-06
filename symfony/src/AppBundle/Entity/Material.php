<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", indexes={@ORM\Index(name="fk_apuntes_usuario", columns={"usuario_id"})})
 * @ORM\Entity
 */
class Material
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="string", length=45, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenes", type="string", length=45, nullable=true)
     */
    private $imagenes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime", nullable=false)
     */
    private $fechaPublicacion;

    /**
     * @var \integer
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param string $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * @param string $imagenes
     */
    public function setImagenes($imagenes)
    {
        $this->imagenes = $imagenes;
    }

    /**
     * @return \DateTime
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * @param \DateTime $fechaPublicacion
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    /**
     * @return \integer
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param \integer $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


}

