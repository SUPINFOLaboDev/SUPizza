<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Session;
use AppBundle\Form\SessionType;

/**
 * Session controller.
 *
 * @Route("/session")
 */
class SessionController extends Controller
{
    /**
     * Lists all Session entities.
     *
     * @Route("/", name="session")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sessions = $em->getRepository('AppBundle:Session')->findAll();

        return array(
            'sessions' => $sessions,
        );
    }

    /**
     * Creates a new Session entity.
     *
     * @Route("/", name="session_create")
     * @Method("POST")
     * @Template("AppBundle:Session:new.html.twig")
     *
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $session = new Session();
        $form = $this->createCreateForm($session);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();

            return $this->redirect($this->generateUrl('session_show', array('id' => $session->getId())));
        }

        return array(
            'session'   => $session,
            'form'      => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Session entity.
     *
     * @param Session $session The entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Session $session)
    {
        $form = $this->createForm(new SessionType(), $session, array(
            'action' => $this->generateUrl('session_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Session entity.
     *
     * @Route("/new", name="session_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $session    = new Session();
        $form       = $this->createCreateForm($session);

        return array(
            'session'   => $session,
            'form'      => $form->createView(),
        );
    }

    /**
     * Finds and displays a Session entity.
     *
     * @Route("/{id}", name="session_show", requirements={"id"="\d+"})
     * @Method("GET")
     * @Template()
     *
     * @param $id
     * @return array
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $em->getRepository('AppBundle:Session')->find($id);

        if (!$session) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        return array(
            'session' => $session,
        );
    }

    /**
     * Displays a form to edit an existing Session entity.
     *
     * @Route("/{id}/edit", name="session_edit", requirements={"id"="\d+"})
     * @Method("GET")
     * @Template()
     *
     * @param $id
     * @return array
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $em->getRepository('AppBundle:Session')->find($id);

        if (!$session) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        $editForm = $this->createEditForm($session);

        return array(
            'session'     => $session,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Session entity.
    *
    * @param Session $entity The entity
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Session $entity)
    {
        $form = $this->createForm(new SessionType(), $entity, array(
            'action' => $this->generateUrl('session_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }

    /**
     * Edits an existing Session entity.
     *
     * @Route("/{id}", name="session_update", requirements={"id"="\d+"})
     * @Method("PUT")
     * @Template("AppBundle:Session:edit.html.twig")
     *
     * @param Request $request
     * @param $id
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $em->getRepository('AppBundle:Session')->find($id);

        if (!$session) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        $editForm = $this->createEditForm($session);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('session_edit', array('id' => $id)));
        }

        return array(
            'session'     => $session,
            'edit_form'   => $editForm->createView(),
        );
    }

}
