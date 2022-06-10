<?php

namespace App\Classe;


use Symfony\Component\HttpFoundation\RequestStack;


class Cart

{
    private $stack;

    public function __construct(RequestStack $stack)
    {

        $this->stack= $stack;
    }

    public function add($id)
    {
        $session=$this->stack->getSession();
        $cart=$session->get('cart', []);

        if(!empty($cart[$id])){
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $session->set('cart', $cart);

    }

    public function get()
    {
        $get = $this->stack->getSession();
        return $get->get('cart');
    }

    public function remove()
    {
        $remove = $this->stack->getSession();
        return $remove->remove('cart');
    }
}