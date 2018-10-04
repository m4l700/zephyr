<?php

namespace Dh\MainBundle\Controller;

use Dh\MainBundle\Entity\Flickr;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Flickr controller.
 *
 * @Route("settings/flickr")
 */
class FlickrController extends Controller
{
    /**
     * Lists all flickr entities.
     *
     * @Route("/", name="settings_flickr_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flickrs = $em->getRepository('DhMainBundle:Flickr')->findAll();

        //Get logged in username.
        $username = $this->getUser();

        return $this->render('DhSettingsBundle:Flickr:index.html.twig', array(
            'flickrs' => $flickrs,
            'username' => $username,
        ));
    }

    /**
     * Creates a new flickr entity.
     *
     * @Route("/new", name="settings_flickr_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $flickr = new Flickr();
        $form = $this->createForm('Dh\MainBundle\Form\FlickrType', $flickr);
        $form->handleRequest($request);

        //Get logged in username.
        $username = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flickr);
            $em->flush($flickr);

            return $this->redirectToRoute('settings_flickr_show', array('id' => $flickr->getId()));
        }

        return $this->render('DhSettingsBundle:Flickr:new.html.twig', array(
            'flickr' => $flickr,
            'form' => $form->createView(),
            'username' => $username,
        ));
    }

    /**
     * Finds and displays a flickr entity.
     *
     * @Route("/{id}", name="settings_flickr_show")
     * @Method("GET")
     */
    public function showAction(Flickr $flickr)
    {
        $deleteForm = $this->createDeleteForm($flickr);

        //Get logged in username.
        $username = $this->getUser();

        return $this->render('DhSettingsBundle:Flickr:show.html.twig', array(
            'flickr' => $flickr,
            'delete_form' => $deleteForm->createView(),
            'username' => $username,
        ));
    }

    /**
     * Displays a form to edit an existing flickr entity.
     *
     * @Route("/{id}/edit", name="settings_flickr_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Flickr $flickr)
    {
        $deleteForm = $this->createDeleteForm($flickr);
        $editForm = $this->createForm('Dh\MainBundle\Form\FlickrType', $flickr);
        $editForm->handleRequest($request);

        //Get logged in username.
        $username = $this->getUser();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('settings_flickr_edit', array('id' => $flickr->getId()));
        }

        return $this->render('DhSettingsBundle:Flickr:edit.html.twig', array(
            'flickr' => $flickr,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'username' => $username,
        ));
    }

    /**
     * Deletes a flickr entity.
     *
     * @Route("/{id}", name="settings_flickr_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Flickr $flickr)
    {
        $form = $this->createDeleteForm($flickr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flickr);
            $em->flush($flickr);
        }

        return $this->redirectToRoute('settings_flickr_index');
    }

    /**
     * Creates a form to delete a flickr entity.
     *
     * @param Flickr $flickr The flickr entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Flickr $flickr)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settings_flickr_delete', array('id' => $flickr->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
