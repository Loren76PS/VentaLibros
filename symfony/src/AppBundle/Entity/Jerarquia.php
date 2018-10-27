<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jerarquia
 *
 * @ORM\Table(name="jerarquia", indexes={@ORM\Index(name="fk_categoria_has_categoria_categoria1", columns={"categoria_superior"}), @ORM\Index(name="fk_categoria_has_categoria_categoria2", columns={"categoria_inferior"})})
 * @ORM\Entity
 */
class Jerarquia
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_superior", referencedColumnName="id")
     * })
     */
    private $categoriaSuperior;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_inferior", referencedColumnName="id")
     * })
     */
    private $categoriaInferior;


}

