<?php
 namespace App\Controller;

 use FOS\RestBundle\View\View;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\JsonResponse;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;
 use FOS\RestBundle\Controller\Annotations as Rest;
 use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
 use Symfony\Component\VarExporter\Internal\Hydrator;
 use Ws\Delivery\Common\Entity\Position;

 class GetPosition extends Controller
 {
     /**
      * Get all existing positions of parcel
      * @Rest\Get("/positions/{parcelNumber}")
      */
     public function getPositionAction($parcelNumber)
     {
         $repository = $this->getDoctrine()->getRepository(Position::class);
         $data = $repository->findByParcelNumber($parcelNumber);

         if(!$data){
             return new JsonResponse(array('message'=>'Aucun colis existe avec ce numéro !'), Response::HTTP_NOT_FOUND, []);
             //throw new NotFoundHttpException('Aucun colis existe avec ce numéro !');
         }

         return new JsonResponse($data, Response::HTTP_OK, []);
     }
 }