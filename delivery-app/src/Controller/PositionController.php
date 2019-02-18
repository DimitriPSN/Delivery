<?php
namespace App\Controller;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Ws\Delivery\Client\PositionClient;
use Ws\Delivery\Common\Entity\Position;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/*
 * On lieu de créer le formulaire directement dans ce controlleur,
 * On pourrait créer un dossier "Form" avec une classe "SearchPositionForm" et "NewPositionForm" par exemple
 * qui créera ensuite le formulaire en question.
 * Ce qui permettrait de réutuliser le formulaire dans une autre page sans duplication de code
 *
 * Comme indique ici : https://symfony.com/doc/current/best_practices/forms.html
 *
 * Idem, pour les contraints de validation on pourrait le faire dans Entity
 *
 */

class PositionController extends AbstractController
{
    /**
     * @Route(path="/", name="home")
     */
    public function home(Request $request, PositionClient $client)
    {
        $position = new Position();
        $result = null;

        $form = $this->createFormBuilder($position)
            ->add('parcelNumber', TextType::class, array('constraints' => array(new NotBlank(array('message'=>'Le numéro de colis est obligatoire !')))))
            ->add('send', SubmitType::class, array('label'=>'Rechercher'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $result = $client->getPosition($data->parcelNumber);

            return $this->render('home.html.twig', array(
                'form' => $form->createView(),
                'result' => $result
            ));
        }

        return $this->render('home.html.twig', array(
            'form' => $form->createView(),
            'result' => $result
        ));
    }

    /**
     * @Route(path="/new", name="new")
     */
    public function add(Request $request, PositionClient $client)
    {
        $position = new Position();
        $result = null;

        $form = $this->createFormBuilder($position)
            ->add('parcelNumber', TextType::class, array('constraints' => array(new NotBlank(array('message'=>'Le numéro de colis est obligatoire !')))))
            ->add('latitude', NumberType::class, array('constraints' => array(new NotBlank(array('message'=>'La latitude est obligatoire !')), new Type(array('type'=>'float', 'message'=>'La latitude doit être un chiffre !')))))
            ->add('longitude', NumberType::class, array('constraints' => array(new NotBlank(array('message'=>'La longitude est obligatoire !')), new Type(array('type'=>'float', 'message'=>'La longitude doit être un chiffre !')))))
            //->add('date', DateTimeType::class, array('data' => new \DateTime("now")))
            ->add('send', SubmitType::class,  array('label'=>'Ok'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $result = $client->addPosition($data);

            return $this->render('new.html.twig', array(
                'form' => $form->createView(),
                'result' => $result
            ));
        }

        return $this->render('new.html.twig', array(
            'form' => $form->createView(),
            'result' => $result
        ));
    }
}