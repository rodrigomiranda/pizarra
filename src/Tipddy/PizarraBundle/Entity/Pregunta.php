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
 * Tipddy\PizarraBundle\Entity\Pregunta
 *
 * @ORM\Table(name="pregunta")
 * @ORM\Entity
 */
class Pregunta
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
     * @ORM\OneToMany(targetEntity="Respuesta", mappedBy="pregunta")
     *
     */   
    private $respuestas;
     


    public function __construct()
    {
        $this->respuestas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add respuestas
     *
     * @param Tipddy\PizarraBundle\Entity\Respuesta $respuestas
     */
    public function addRespuesta(\Tipddy\PizarraBundle\Entity\Respuesta $respuestas)
    {
        $this->respuestas[] = $respuestas;
    }

    /**
     * Get respuestas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }
}