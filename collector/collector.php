<?php

class collector
{
    public $animals_processed, $successfully_processed_animals, $eggs_number_received, $milk_litres_received;

    public function __construct()
    {
        $this->animals_processed = 0;
        $this->successfully_processed_animals = 0;
        $this->eggs_number_received = 0;
        $this->milk_litres_received = 0;
    }

    public function process_animal($animal)
    {
        $this->animals_processed++;
        if ($animal->isViandReceived === false) {
            $this->successfully_processed_animals++;
            if ($animal->animal_kind === 'cow') {
                $current_cow_milk_litres_received = $animal->get_viand();
                $this->milk_litres_received += $current_cow_milk_litres_received;
            } else if ($animal->animal_kind === 'chicken') {
                $current_chicken_eggs_number_received = $animal->get_viand();
                $this->eggs_number_received += $current_chicken_eggs_number_received;
            }
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
        echo "Animals processed: $this->animals_processed ;\nAnimals successfully processed: $this->successfully_processed_animals ;\nEggs received:  $this->eggs_number_received ;\nMilk litres received: $this->milk_litres_received ;\n";
    }
}
