<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategoryController extends Controller
{

    public function listAction()
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les produits de ma base de donnees avec la methode findAll()
        $categories = $em->getRepository('StoreBackendBundle:Category')->findAll();
                                      //nom du bundle : Nom du l entité
                             //c comme la requete : SELECT * FROM Category

        return $this->render('StoreBackendBundle:Category:list.html.twig', array(
            'categories'=>$categories
        ));
    }

    /**
     * viea a category
     * @param $
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id, $name)
    {

        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les category  de ma base de donnees avec la methode find
        $category = $em->getRepository('StoreBackendBundle:Category')->find($id);
//nom du bundle : Nom du l entité
//c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Category:view.html.twig', array(
            'category'=> $category
        ));
    }

    public function removeAction($id)
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere UN SEUL Category  de ma base de donnees avec la methode find
        $category = $em->getRepository('StoreBackendBundle:Category')->find($id);
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        $em->remove($category);
        $em->flush();

        // Nouveauté 2.6 Symfony Il a supprimer et on redirige vers la liste de produit
        return $this->redirectToRoute('store_backend_category_list');
    }
}

?>



























