<?php

namespace Dh\MainBundle\Controller;

use Dh\MainBundle\Entity\Rss;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rss controller.
 *
 * @Route("edit")
 */
class RssController extends Controller
{
    /**
     * Lists all rss entities.
     *
     * @Route("/rss", name="edit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rsses = $em->getRepository('DhMainBundle:Rss')->findAll();

        //Get logged in username.
        $username = $this->getUser();

        return $this->render('rss/index.html.twig', array(
            'rsses' => $rsses,
            'username' => $username,
        ));
    }

    /**
     * Creates a new rss entity.
     *
     * @Route("/rss/new", name="edit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //Get logged in username.
        $username = $this->getUser();

        $rss = new Rss();
        $form = $this->createForm('Dh\MainBundle\Form\RssType', $rss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rss);
            $em->flush($rss);

            return $this->redirectToRoute('edit_show', array('id' => $rss->getId()));
        }

        return $this->render('rss/new.html.twig', array(
            'rss' => $rss,
            'form' => $form->createView(),
            'username' => $username,
        ));
    }

    /**
     * Finds and displays a rss entity.
     *
     * @Route("/rss/{id}", name="edit_show")
     * @Method("GET")
     */
    public function showAction(Rss $rss)
    {
        //Get logged in username.
        $username = $this->getUser();

        $deleteForm = $this->createDeleteForm($rss);

        return $this->render('rss/show.html.twig', array(
            'rss' => $rss,
            'delete_form' => $deleteForm->createView(),
            'username' => $username,
        ));
    }

    /**
     * Displays a form to edit an existing rss entity.
     *
     * @Route("/rss/{id}/edit", name="edit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rss $rss)
    {
        $deleteForm = $this->createDeleteForm($rss);
        $editForm = $this->createForm('Dh\MainBundle\Form\RssType', $rss);
        $editForm->handleRequest($request);

        //Get logged in username.
        $username = $this->getUser();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edit_edit', array('id' => $rss->getId()));
        }

        return $this->render('rss/edit.html.twig', array(
            'rss' => $rss,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'username' => $username,
        ));
    }

    /**
     * Deletes a rss entity.
     *
     * @Route("/rss/{id}", name="edit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rss $rss)
    {
        $form = $this->createDeleteForm($rss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rss);
            $em->flush($rss);
        }

        return $this->redirectToRoute('edit_index');
    }

    /**
     * Creates a form to delete a rss entity.
     *
     * @param Rss $rss The rss entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rss $rss)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('edit_delete', array('id' => $rss->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
