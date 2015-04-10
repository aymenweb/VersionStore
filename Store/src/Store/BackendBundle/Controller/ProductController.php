<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProductController
 * @package Store\BackendBundle\Controller
 */
class ProductController extends Controller
{
    /**
     * list of products
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les produits de ma base de donnees avec la methode findAll()
        $products = $em->getRepository('StoreBackendBundle:Product')->findAll();
                                      //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Product:list.html.twig', array(
            'products'=> $products
        ));
    }

    /**
     * View a Product
     * Le nom de ma clef sera le nom de ma variable en vue
     * On transmet le name à la vue
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id, $name)
    {

        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les produits de ma base de donnees avec la methode find
        $product = $em->getRepository('StoreBackendBundle:Product')->find($id);
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Product:view.html.twig', array(
            'product'=> $product
        ));
    }
// le $id vient de l url - du routing
    public function removeAction($id)
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere UN SEUL Produit  de ma base de donnees avec la methode find
        $product = $em->getRepository('StoreBackendBundle:Product')->find($id);
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        $em->remove($product);
        $em->flush();

        // Nouveauté 2.6 Symfony Il a supprimer et on redirige vers la liste de produit
        return $this->redirectToRoute('store_backend_product_list');
    }
}
?>

































