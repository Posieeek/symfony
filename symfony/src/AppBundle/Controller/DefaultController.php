<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Produkt;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class DefaultController extends Controller
{

    /**
     * @Route("/json", name="json_index")
     */
    public function JsonAction(Request $request)
    {

        $baza = $this
            -> getDoctrine()
            -> getManager();
        $baza1 = $baza->createQueryBuilder();
        $query = $baza1->select('u')->from(Produkt::class,'u')->getQuery();
        $produkty = $query->getArrayResult();
        return new JsonResponse($produkty);

    }

    /**
     * @Route("/json2", name="json_index2")
     */
    public function JsonAction2(Request $request)
    {

        $baza = $this
            -> getDoctrine()
            -> getManager();
        $baza1 = $baza->createQueryBuilder();
        $query = $baza1->select('u')->from(Product::class,'u')->getQuery();
        $producty = $query->getArrayResult();
        return new JsonResponse($producty);

    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
