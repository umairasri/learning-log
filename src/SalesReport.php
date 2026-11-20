<?php

declare(strict_types=1);

namespace LearningLog;

class SalesReport
{
    /** @var array<string, float> */
    private array $totals = [];

    public function add(Sale $sale): void
    {
        $name = $sale->product();
        $this->totals[$name] = ($this->totals[$name] ?? 0) + $sale->total();
    }

    /** @return array<string, float> */
    public function totals(): array
    {
        return $this->totals;
    }

    public function grandTotal(): float
    {
        return array_sum($this->totals);
    }
}