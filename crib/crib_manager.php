<?php

class crib_space
{
    public $crib_animbals;

    public function __construct()
    {
        $this->crib_animbals = [];
    }

    public function add_animal($type, $animal_possible_min_viand  = 0, $animal_possible_max_viand = 0)
    {
        if($type){
            if (class_exists('new '.$type) || class_exists($type)) {
                array_push($this->crib_animbals, new $type($animal_possible_min_viand,  $animal_possible_max_viand));
            }else{
                array_push($this->crib_animbals, new animal($type, $animal_possible_min_viand,  $animal_possible_max_viand));
            }
        }else{
            echo 'no type selected';
        }
    }

    public function add_animals($number, $type, $animal_possible_min_viand = 0, $animal_possible_max_viand = 0 )
    {

        for ($i = 0; $i < $number; $i++) {
            $this->add_animal($type, $animal_possible_min_viand, $animal_possible_max_viand);
        }

    }


    public function list_all_animals()
    {
        for ($i = 0; $i < count($this->crib_animbals); $i++) {
            $current_animal = $this->crib_animbals[$i];
            $current_animal->get_animal_information();
        }
    }

    public function get_total_animals_number()
    {
        $total_of_crib_animals = count($this->crib_animbals);
        echo ($total_of_crib_animals . ' - total number of animals in crib');
        return $total_of_crib_animals;
    }
}
