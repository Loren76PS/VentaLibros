<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apuntes
 *
 * @ORM\Table(name="apuntes")
 * @ORM\Entity
 */
class Apuntes
{
    /**
     * @var string
     *
     * @ORM\Column(name="temas", type="string", length=45, nullable=true)
     */
    private $temas;

    /**
     * @var \Material
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     * })
     */
    private $material;


}

