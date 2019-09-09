<?php

class animal
{
    public $animal_kind, $registration_number, $isViandReceived;

    public function __construct($animal_kind, $animal_possible_min_viand, $animal_possible_max_viand)
    {
        $this->animal_kind = $animal_kind;
        $this->registration_number = uniqid();
        $this->isViandReceived = false;
        $this->current_animal_possible_min_viand_amount =  $animal_possible_min_viand;
        $this->current_animal_possible_max_viand_amount = $animal_possible_max_viand;
    }

    public function get_animal_information()
    {
        echo "Animal type: $this->animal_kind ;\n Registration number: $this->registration_number ;\n
        Vian Received: " . ($this->isViandReceived ? 'Yes' : 'No') . "\n  ";
    }

    public function set_min_max_animal_viand($possible_min_viand_amount, $possible_max_viand_amount)
    {
        if (isset($possible_min_viand_amount) && isset($possible_max_viand_amount)) {
            $this->current_animal_possible_min_viand_amount = $possible_min_viand_amount;
            $this->current_animal_possible_max_viand_amount = $possible_max_viand_amount;
        } else {
            echo 'Viand type undefined!\n';
            return 0;
        }
    }

    public function get_animal_possible_min_viand()
    {
        return $this->current_animal_possible_min_viand_amount;
    }

    public function get_animal_possible_max_viand()
    {
        return $this->current_animal_possible_max_viand_amount;
    }

    public function get_viand($possible_min_viand_amount, $possible_max_viand_amount)
    {
        
        if (isset($possible_min_viand_amount) && isset($possible_max_viand_amount)) {
            $this->isViandReceived = true;
            return rand($possible_min_viand_amount, $possible_max_viand_amount);
        } else {
            echo 'Viand type undefined!\n';
            return 0;
        }
    }
}

class cow extends animal
{

    public function __construct()
    {
        static $animal_kind = 'cow';
        static $current_animal_possible_min_viand_amount =  8;
        static $current_animal_possible_max_viand_amount = 12;

        parent::__construct($animal_kind, $current_animal_possible_min_viand_amount, $current_animal_possible_max_viand_amount);
    }

    public function get_viand($possible_min_viand_amount =  0, $possible_max_viand_amount = 12)
    {
        return parent::get_viand(parent::get_animal_possible_min_viand(), parent::get_animal_possible_max_viand());
    }
}


class chicken extends animal
{

    public function __construct()
    {
        static $animal_kind = 'chicken';
        static $current_animal_possible_min_viand_amount =  0;
        static $current_animal_possible_max_viand_amount = 1;

        parent::__construct($animal_kind, $current_animal_possible_min_viand_amount, $current_animal_possible_max_viand_amount);
    }

    public function get_viand($possible_min_viand_amount =  0, $possible_max_viand_amount = 1)
    {
        return parent::get_viand(parent::get_animal_possible_min_viand(), parent::get_animal_possible_max_viand());
    }
}
