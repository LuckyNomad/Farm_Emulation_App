<?php

ini_set("log_errors", 1);
ini_set("error_log", "php_error.log");

foreach (glob("crib/*.php") as $filename) {
    include $filename;
}

foreach (glob("collector/*.php") as $filename) {
    include $filename;
}

echo "FARMING EMULATION STARTED.\n";
$farm_crib = new crib_space();
$farm_crib->add_animals(10, 'cow');
$farm_crib->add_animals(20, 'chicken');
$farm_crib->add_animals(5, 'sheep', 50, 100);
$farm_production_collector = new collector();
$farm_production_collector->process_all_animals_in_crib($farm_crib);
$farm_production_collector->get_process_info();

echo "Type YES to stop system.\n";
$handle = fopen("php://stdin", "r");
$line = fgets($handle);

fclose($handle);
echo "\n";
echo "Stopping system. Thank you...\n";
