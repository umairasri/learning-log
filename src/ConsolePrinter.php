<?php

declare(strict_types=1);

namespace LearningLog;

class ConsolePrinter implements Printer
{
    public function print(SalesReport $report): void
    {
        foreach ($report->totals() as $product => $total) {
            printf("%-15s %10.2f\n", $product, $total);
        }

        printf("%-15s %10.2f\n", 'Total', $report->grandTotal());
    }
}