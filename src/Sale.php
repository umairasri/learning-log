<?php

declare(strict_types=1);

namespace LearningLog;

class Sale
{
    public function __construct(
        private string $product,
        private int $quantity,
        private float $price,
    ) {

    }

    public function product(): string
    {
        return $this->product;
    }

    public function total(): float
    {
        return $this->quantity * $this->price;
    }
}