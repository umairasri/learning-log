<?php

declare(strict_types=1);

// Read the filename for the command line, or use sales.csv by default
$file = $argv[1] ?? 'sales.csv';

if (!file_exists($file)) {
    fwrite(STDERR, "File not found: $file\n");
    exit(1);
}

$handle = fopen($file, 'r');
fgetcsv($handle); // Skip the header row

$totals = [];
$totalSales = 0.0;

// Read one row at a time until the end of the file.
while (($row = fgetcsv($handle)) !== false) {
    [$products, $quantity, $price] = $row;

    // Add this sale to the product's running total.
    $totals[$products] = ($totals[$products] ?? 0) + ((int) $quantity * (float) $price);
    $totalSales += (int) $quantity * (float) $price;
}

fclose($handle);

// Print each product and its total, with two decimal places.
foreach ($totals as $products => $total) {
    printf("%-15s %10.2f\n", $products, $total);
}
// Print the total sales.
printf("Total Sales: %10.2f\n", $totalSales);