<?php


namespace App\Controller;


use App\Entity\Card;
use App\Entity\Customer;
use App\Entity\Product;
use App\Form\Type\CardType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CardController extends AbstractApiController
{
    public function showAction(Request $request): Response {
        $customerId = $request->get('id');
        $customer = $this->getDoctrine()->getRepository(Customer::class)->findOneBy(['id' => $customerId]);

        if(!$customer) {
            throw new NotFoundHttpException('Customer not found');
        }

        $card = $this->getDoctrine()->getRepository(Card::class)->findOneBy([
            'customer' => $customer
        ]);

        if(!$card) {
            throw new NotFoundHttpException("Cart does not exist");
        }

        return $this->respond($card);
    }
    public function createAction(Request $request) {

        $form = $this->buildForm(CardType::class);
        $form->handleRequest($request);

        if(!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }
        /** @var Card $card */
        $card = $form->getData();

        $this->getDoctrine()->getManager()->persist($card);
        $this->getDoctrine()->getManager()->flush();

        return $this->respond($card);
    }
}