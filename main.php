<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Sale.php';
require_once __DIR__ . '/src/SalesReport.php';
require_once __DIR__ . '/src/Printer.php';
require_once __DIR__ . '/src/ConsolePrinter.php';

use LearningLog\ConsolePrinter;
use LearningLog\Sale;
use LearningLog\SalesReport;

$file = $argv[1] ?? 'sales.csv';

if (!file_exists($file)) {
    fwrite(STDERR, "File not found: $file\n");
    exit(1);
}

$handle = fopen($file, 'r');
fgetcsv($handle); // skip the header

$report = new SalesReport();

while (($row = fgetcsv($handle)) !== false) {
    [$product, $quantity, $price] = $row;
    $report->add(new Sale($product, (int) $quantity, (float) $price));
}

fclose($handle);

$printer = new ConsolePrinter();
$printer->print($report);