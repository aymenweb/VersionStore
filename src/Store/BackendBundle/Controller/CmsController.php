<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController
 * @package Store\BackendBundle\Controller
 */
class CmsController extends Controller
{

    public function listAction()
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les produits de ma base de donnees avec la methode findAll()
        $cms = $em->getRepository('StoreBackendBundle:Cms')->findAll();
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM cms

        return $this->render('StoreBackendBundle:Cms:list.html.twig', array(
            'Cms'=>$cms
        ));
    }


    public function viewAction($id, $name)
    {

        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les cms de ma base de donnees avec la methode find
        $cms = $em->getRepository('StoreBackendBundle:Cms')->find($id);
//nom du bundle : Nom du l entité
//c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Cms:view.html.twig', array(
            'cms'=> $cms
        ));
    }
}
?>














