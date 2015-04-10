<?php
// l'endroit ou je déclare ma classe MainControlleur
namespace Store\BackendBundle\Controller;

//j'inclue la classe controller de S. pour en hériter.
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SupplierController extends Controller
{

    public function listAction()
    {

        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere tous les produits de ma base de donnees avec la methode findAll()
        $suppliers = $em->getRepository('StoreBackendBundle:Supplier')->findAll();
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Supplier:list.html.twig', array(
            'suppliers'=> $suppliers
        ));

    }


    public function viewAction($id, $name)
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere un supplier de ma base de donnees avec la methode find
        $supplier = $em->getRepository('StoreBackendBundle:Supplier')->find($id);
//nom du bundle : Nom du l entité
//c comme la requete : SELECT * FROM product

        return $this->render('StoreBackendBundle:Supplier:view.html.twig', array(
            'supplier'=> $supplier
        ));
    }

    public function removeAction($id)
    {
        // recupere le manager de doctrine : le conteneur d objet de doctrine
        $em = $this->getDoctrine()->getManager();

        //Je recupere UN SEUL Suppmier  de ma base de donnees avec la methode find
        $supplier = $em->getRepository('StoreBackendBundle:Supplier')->find($id);
        //nom du bundle : Nom du l entité
        //c comme la requete : SELECT * FROM product

        $em->remove($supplier);
        $em->flush();

        // Nouveauté 2.6 Symfony Il a supprimer et on redirige vers la liste de produit
        return $this->redirectToRoute('store_backend_supplier_list');
    }
}
?>

























