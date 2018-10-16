<?php

namespace Dh\SettingsBundle\Controller;

use Dh\SettingsBundle\Entity\Crawlersettings;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Crawlersetting controller.
 *
 * @Route("settings/crawler")
 */
class CrawlersettingsController extends Controller
{
    /**
     * Lists all crawlersetting entities.
     *
     * @Route("/", name="settings_crawler_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $crawlersettings = $em->getRepository('DhSettingsBundle:Crawlersettings')->findAll();

        //Get logged in username.
        $username = $this->getUser();

        return $this->render('DhSettingsBundle:Crawler:index.html.twig', array(
            'crawlersettings' => $crawlersettings,
            'username' => $username,
        ));
    }

    /**
     * Creates a new crawlersetting entity.
     *
     * @Route("/new", name="settings_crawler_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $crawlersetting = new Crawlersettings();
        $form = $this->createForm('Dh\SettingsBundle\Form\CrawlersettingsType', $crawlersetting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($crawlersetting);
            $em->flush($crawlersetting);

            return $this->redirectToRoute('settings_crawler_show', array('id' => $crawlersetting->getId()));
        }

        return $this->render('DhSettingsBundle:Crawler:new.html.twig', array(
            'crawlersetting' => $crawlersetting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a crawlersetting entity.
     *
     * @Route("/{id}", name="settings_crawler_show")
     * @Method("GET")
     */
    public function showAction(Crawlersettings $crawlersetting)
    {
        $deleteForm = $this->createDeleteForm($crawlersetting);

        return $this->render('DhSettingsBundle:Crawler:show.html.twig', array(
            'crawlersetting' => $crawlersetting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing crawlersetting entity.
     *
     * @Route("/{id}/edit", name="settings_crawler_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Crawlersettings $crawlersetting)
    {
        $deleteForm = $this->createDeleteForm($crawlersetting);
        $editForm = $this->createForm('Dh\SettingsBundle\Form\CrawlersettingsType', $crawlersetting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('settings_crawler_edit', array('id' => $crawlersetting->getId()));
        }

        return $this->render('DhSettingsBundle:Crawler:edit.html.twig', array(
            'crawlersetting' => $crawlersetting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a crawlersetting entity.
     *
     * @Route("/{id}", name="settings_crawler_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Crawlersettings $crawlersetting)
    {
        $form = $this->createDeleteForm($crawlersetting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($crawlersetting);
            $em->flush($crawlersetting);
        }

        return $this->redirectToRoute('settings_crawler_index');
    }

    /**
     * Creates a form to delete a crawlersetting entity.
     *
     * @param Crawlersettings $crawlersetting The crawlersetting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Crawlersettings $crawlersetting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settings_crawler_delete', array('id' => $crawlersetting->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
