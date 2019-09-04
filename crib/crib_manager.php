<?php

class crib_space
{
    public $crib_animbals;
    const UNDEFINED_ANIMAL_TYPE_ERROR = 'undefined type of animal';

    function __construct()
    {
        $this->crib_animbals = [];
    }

    function add_animal($type)
    {
        if ($type === 'cow') {
            array_push($this->crib_animbals, new cow());
        } else if ($type === 'chicken') {
            array_push($this->crib_animbals, new chicken());
        } else {
            echo UNDEFINED_ANIMAL_TYPE_ERROR;
        }
    }

    function add_animals($number, $type)
    {
        if ($type === 'cow') {
            for ($i = 0; $i < $number; $i++) {
                array_push($this->crib_animbals,  new cow());
            }
        } else if ($type === 'chicken') {
            for ($i = 0; $i < $number; $i++) {
                array_push($this->crib_animbals, new chicken());
            }
        } else {
            echo UNDEFINED_ANIMAL_TYPE_ERROR;
        }
    }

    function list_all_animals()
    {
        for ($i = 0; $i < count($this->crib_animbals); $i++) {
            $current_animal = $this->crib_animbals[$i];
            $current_animal->get_animal_information();
        }
    }

    function get_total_animals_number()
    {
        $total_of_crib_animals = count($this->crib_animbals);
        echo ($total_of_crib_animals . ' - total number of animals in crib');
        return $total_of_crib_animals;
    }
}
