<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StaticsController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction()
    {
        return $this->render('StoreBackendBundle:Statics:contact.html.twig');
        //retourne le vue contact dans le dossier Statics de mon bundle
    }

     public function aboutAction()
    {
        return $this->render('StoreBackendBundle:Statics:about.html.twig');
        //retourne le vue about dans le dossier Statics de mon bundle
    }

    public function termsAction()
    {
        return $this->render('StoreBackendBundle:Statics:terms.html.twig');
        //retourne le vue terms dans le dossier Statics de mon bundle
    }

    public function conceptAction()
    {
        return $this->render('StoreBackendBundle:Statics:concept.html.twig');
        //retourne le vue terms dans le dossier Statics de mon bundle
    }

}
?>