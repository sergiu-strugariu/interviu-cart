<?php

class Cart
{
    private $items = []; // Lista de produse din cos
    private $totalValue = 0; // Valoarea totala a cosului
    const SHIPPING_COST = 15; // Costul de livrare

    // Adauga un produs in cos
    public function addItem(array $item)
    {
        // Descompune valorile din array-ul $item in variabile separate pentru a facilita accesul
        list($productId, $quantity, $price) = [$item['productId'], $item['qty'], $item['price']];

        // Verifica daca produsul exista deja in cos
        $this->items[$productId] = isset($this->items[$item['product_id']])
            ? ['qty' => $this->items[$item[$productId]][$quantity] + $item[$quantity], 'price' => $item[$price]]
            : $item;

        // Actualizeaza valoarea totala
        $this->updateTotalValue();
    }

    // Actualizeaza valoarea totala a cosului
    private function updateTotalValue()
    {
        // Calculeaza valoarea totala folosind array_reduce
        $this->totalValue = array_reduce($this->items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['qty']);
        }, 0);

        // Verifica daca valoarea totala depaseste 200 pentru a reduce costul de livrare
        if ($this->totalValue > 200) {
            $this->totalValue -= self::SHIPPING_COST;
        }
    }

    // Returneaza valoarea totala a cosului, inclusiv costul de livrare
    public function getTotalValue(): float
    {
        return $this->totalValue + self::SHIPPING_COST;
    }

    // Returneaza costul de livrare
    public function getShippingCost(): float
    {
        return $this->totalValue > 200 ? 0 : self::SHIPPING_COST;
    }
}
