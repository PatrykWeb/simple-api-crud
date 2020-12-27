<?php


namespace App\Controller;



use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractController
{
    public function indexAction(Request $request): Response {
        $customer = $this->getDoctrine()->getRepository(Customer::class)->findAll();
        return $this->json($customer);
    }
    public function createAction(Request $request): Response {
        return $this->json('');
    }

}