<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class MainController
 * @package Store\BackendBundle\Controller
 */
class MainController extends Controller
{
    /**
     * Dashboard on backend (page d'acceuil par defaut)
     */
    public function indexAction()
    {
        return $this->render('StoreBackendBundle:Main:index.html.twig');
    }
}
?>