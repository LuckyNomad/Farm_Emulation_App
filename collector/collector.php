<?php

class collector
{
    public $animals_processed, $successfully_processed_animals, $eggs_number_received, $milk_litres_received;

    public function __construct()
    {
        $this->animals_processed = 0;
        $this->successfully_processed_animals = 0;
        $this->viand_received = [];
    }

    public function process_animal($animal)
    {
        $this->animals_processed++;
        if ($animal->isViandReceived === false) {
            if (class_exists('new ' . $animal->animal_kind) || class_exists($animal->animal_kind)) {
                $viand = $animal->get_viand();
            }else{
                $viand = $animal->get_viand($animal->get_animal_possible_min_viand(), $animal->get_animal_possible_max_viand());
            }
            $this->successfully_processed_animals++;
            $this->viand_received[$animal->animal_kind] += $viand;

        } else {
            echo 'Failed! Viand already received \n';
        }
    }

    public function process_all_animals_in_crib($crib_space)
    {
        $this->animals_processed = 0;
        for ($i = 0; $i < count($crib_space->crib_animbals); $i++) {
            $current_animal = $crib_space->crib_animbals[$i];
            $this->process_animal($current_animal);
        }
    }


    public function get_process_info()
    {
        echo "Animals processed: $this->animals_processed ;\nAnimals successfully processed: $this->successfully_processed_animals ;\n";
        foreach ($this->viand_received as $animal_type => $animal_viand_received){
            echo "Animal type: ".$animal_type."; Viand received:". $animal_viand_received.";\n";   
        }
    }
}
