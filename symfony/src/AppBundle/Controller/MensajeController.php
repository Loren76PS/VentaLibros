<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mensaje;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mensaje controller.
 *
 * @Route("mensaje")
 */
class MensajeController extends Controller
{
    /**
     * Lists all mensaje entities.
     *
     * @Route("/", name="mensaje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mensajesEnviados = $em->getRepository('AppBundle:Mensaje')->findByUsuarioEmisor($this->getUser());
        $mensajesRecibidos = $em->getRepository('AppBundle:Mensaje')->findByUsuarioReceptor($this->getUser());

        return $this->render('mensaje/index.html.twig', array(
            'mensajesEnviados' => $mensajesEnviados,
            'mensajesRecibidos' => $mensajesRecibidos,
        ));
    }

    /**
     * Creates a new mensaje entity.
     *
     * @Route("/new/ ", name="mensaje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mensaje = new Mensaje();
        $userEmisor = $this->getUser();
        $userReceptor = $_GET['user'];
        $form = $this->createForm('AppBundle\Form\MensajeType', $mensaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fecha = new \DateTime();
            $mensaje->setFechaCreacion($fecha);
            $classUserEmisor = $em->getRepository('AppBundle:Usuario')->find($userEmisor);
            $mensaje->setUsuarioEmisor($classUserEmisor);
            $classUserReceptor = $em->getRepository('AppBundle:Usuario')->findOneByUsername($userReceptor);
            $mensaje->setUsuarioReceptor($classUserReceptor);
            $em->persist($mensaje);
            $em->flush();

            return $this->redirectToRoute('mensaje_index');
        }

        return $this->render('mensaje/new.html.twig', array(
            'mensaje' => $mensaje,
            'form' => $form->createView(),
        ));
    }
}
