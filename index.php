<?php

require_once 'Cart.php';

// Creaza o instanta a clasei Cart
$cart = new Cart();

// Adauga produse in cos
$cart->addItem(['product_id' => 1, 'qty' => 1, 'price' => 5]); // Produs 1, cantitate 1, pret 5
$cart->addItem(['product_id' => 5, 'qty' => 3, 'price' => 10]); // Produs 5, cantitate 3, pret 10
$cart->addItem(['product_id' => 1, 'qty' => 2, 'price' => 5]); // Produs 1, cantitate 2, pret 5

// Afiseaza costul de livrare
echo 'Shipping cost: ' . $cart->getShippingCost() . "\n";

// Afiseaza totalul cosului (corectat la getTotalValue)
echo 'Cart total: ' . $cart->getTotalValue();
