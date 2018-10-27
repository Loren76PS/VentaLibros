<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialHasEtiqueta
 *
 * @ORM\Table(name="material_has_etiqueta", indexes={@ORM\Index(name="fk_apuntes_has_etiqueta_apuntes1", columns={"material_id"}), @ORM\Index(name="fk_apuntes_has_etiqueta_etiqueta1", columns={"etiqueta_id"})})
 * @ORM\Entity
 */
class MaterialHasEtiqueta
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
     * @var \Material
     *
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     * })
     */
    private $material;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etiqueta_id", referencedColumnName="id")
     * })
     */
    private $etiqueta;


}

