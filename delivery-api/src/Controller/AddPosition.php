<?php
namespace App\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\VarExporter\Internal\Hydrator;
use Ws\Delivery\Common\Entity\Position;

class AddPosition extends Controller
{
    /**
     * Add position
     * @Rest\Post("/new")
     */
    public function addPositionAction(Request $request)
    {
        $position = new Position();

        $position->setParcelNumber($request->request->get('parcelNumber'));
        $position->setLatitude($request->request->get('latitude'));
        $position->setLongitude($request->request->get('longitude'));
        //$position->setDate($request->request->get('date'));
        $position->setDate(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em ->persist($position);
        $em->flush();

        return new JsonResponse(['message' => 'La position a bien été ajouté !'], Response::HTTP_CREATED);
    }
}