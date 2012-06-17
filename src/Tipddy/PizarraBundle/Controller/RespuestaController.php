<?php

namespace Tipddy\PizarraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tipddy\PizarraBundle\Entity\Respuesta;
use Tipddy\PizarraBundle\Form\RespuestaType;

/**
 * Respuesta controller.
 *
 */
class RespuestaController extends Controller
{
    /**
     * Lists all Respuesta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('TipddyPizarraBundle:Pregunta')->findAll();
        
        return $this->render('TipddyPizarraBundle:Respuesta:index.html.twig', array(
               'entities' => $entities,
        ));
        
        
    }

    /**
     * Finds and displays a Respuesta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('TipddyPizarraBundle:Respuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Respuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TipddyPizarraBundle:Respuesta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Respuesta entity.
     *
     */
    public function newAction($pregunta)
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        $pregunta = $em->getRepository('TipddyPizarraBundle:Pregunta')->find($pregunta);   
        
        $respuestas = $em->getRepository('TipddyPizarraBundle:Respuesta')->findBy(array('pregunta' => $pregunta->getId()));     
        
        $entity = new Respuesta();
        $entity->setPregunta($pregunta);
        
        $form   = $this->createForm(new RespuestaType(), $entity);

        return $this->render('TipddyPizarraBundle:Respuesta:new.html.twig', array(
            'entity' => $entity,
            'respuestas' => $respuestas,
            'form'   => $form->createView(),
            'pregunta_id' => $pregunta->getId()
        ));
    }


   /**
     * Displays a form to create a new Respuesta entity.
     *
     */
    public function ajaxAction($pregunta)
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        $pregunta = $em->getRepository('TipddyPizarraBundle:Pregunta')->find($pregunta);   
        
        $respuestas = $em->getRepository('TipddyPizarraBundle:Respuesta')->findBy(array('pregunta' => $pregunta->getId()));     
        
   
        return $this->render('TipddyPizarraBundle:Respuesta:respuestasajax.html.twig', array(
            'respuestas' => $respuestas,
            'pregunta_id' => $pregunta->getId()
        ));
    }








    /**
     * Creates a new Respuesta entity.
     *
     */
    public function createAction()
    {
        $entity  = new Respuesta();
        $request = $this->getRequest();
        $form    = $this->createForm(new RespuestaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('respuesta_show', array('id' => $entity->getId())));
            
        }

        return $this->render('TipddyPizarraBundle:Respuesta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Respuesta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('TipddyPizarraBundle:Respuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Respuesta entity.');
        }

        $editForm = $this->createForm(new RespuestaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TipddyPizarraBundle:Respuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Respuesta entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('TipddyPizarraBundle:Respuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Respuesta entity.');
        }

        $editForm   = $this->createForm(new RespuestaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('respuesta_edit', array('id' => $id)));
        }

        return $this->render('TipddyPizarraBundle:Respuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Respuesta entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('TipddyPizarraBundle:Respuesta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Respuesta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('respuesta'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
