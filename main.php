<?php

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
$farm_production_collector = new collector();
$farm_production_collector->process_all_animals_in_crib($farm_crib);
$farm_production_collector->get_process_info();

echo "Type YES to stop system.\n";
$handle = fopen("php://stdin", "r");
$line = fgets($handle);

if (trim($line) != 'yes') {
    echo "STOPPING!\n";
    exit;
}
fclose($handle);
echo "\n";
echo "Thank you...\n";