<?php

use PHPUnit\Framework\TestCase;

require_once 'Cart.php';

class CartTest extends TestCase
{
    // Testeaza adaugarea unui produs in cos
    public function testAddItem()
    {
        $cart = new Cart();
        $cart->addItem(['productId' => 1, 'qty' => 1, 'price' => 5]); // Foloseste 'productId' pentru consistenta
        $this->assertEquals(5, $cart->getTotalValue() - $cart->getShippingCost()); // Exclude costul de livrare pentru acest test
    }

    // Testeaza costul de livrare
    public function testShippingCost()
    {
        $cart = new Cart();
        $cart->addItem(['productId' => 1, 'qty' => 1, 'price' => 5]);
        $cart->addItem(['productId' => 5, 'qty' => 3, 'price' => 10]);
        $this->assertEquals(15, $cart->getShippingCost()); // Verifica daca costul de livrare este corect
    }

    // Testeaza valoarea totala cu livrare gratuita
    public function testTotalValueWithFreeShipping()
    {
        $cart = new Cart();
        $cart->addItem(['productId' => 1, 'qty' => 20, 'price' => 15]); // Total 300 lei
        $this->assertEquals(300, $cart->getTotalValue() - $cart->getShippingCost()); // Exclude costul de livrare
    }
}
