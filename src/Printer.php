<?php

declare(strict_types=1);

namespace LearningLog;

interface Printer
{
    public function print(SalesReport $report): void;
}