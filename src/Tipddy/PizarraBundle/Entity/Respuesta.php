<?php

/*
* (c) Rodrigo Miranda <rmg.contacto@gmail.com>
*
* This file is part of the Cupon sample application.
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* Este archivo pertenece a la aplicación de prueba Cupon.
* El código fuente de la aplicación incluye un archivo llamado LICENSE
* con toda la información sobre el copyright y la licencia.
*/

namespace Tipddy\PizarraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tipddy\PizarraBundle\Entity\Respuesta
 *
 * @ORM\Table(name="respuesta")
 * @ORM\Entity
 */
 class Respuesta
 {
	 /**
	  * @var bigint $id
	  *
	  * @ORM\Column(name="id", type="bigint", nullable=false)
	  * @ORM\Id
	  * @ORM\GeneratedValue(strategy="IDENTITY")
	  */	 
	 private $id;
	 
	 
	 /**
	  * @ORM\Column(name="etiqueta", type="string", length=255, nullable=false)
	  *
	  * @Assert\NotBlank()
	  */
	 private $etiqueta;
	 
	 
	 
	 /**
	  * 
	  * @ORM\ManyToOne(targetEntity="Pregunta")
	  * @ORM\JoinColumns({
	  * @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id")
	  * })
	  */	 
	 private $pregunta;
	 
	 
	 
 
    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set etiqueta
     *
     * @param string $etiqueta
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    /**
     * Get etiqueta
     *
     * @return string 
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set pregunta
     *
     * @param Tipddy\PizarraBundle\Entity\Pregunta $pregunta
     */
    public function setPregunta(\Tipddy\PizarraBundle\Entity\Pregunta $pregunta)
    {
        $this->pregunta = $pregunta;
    }

    /**
     * Get pregunta
     *
     * @return Tipddy\PizarraBundle\Entity\Pregunta 
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }
}