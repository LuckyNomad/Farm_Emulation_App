<?php

class animal
{
    public $animal_kind, $registration_number, $isViandReceived;

    function __construct($animal_kind)
    {
        $this->animal_kind = $animal_kind;
        $this->registration_number = uniqid();
        $this->isViandReceived = false;
    }

    function get_animal_information()
    {
        echo "Animal type: $this->animal_kind ;\n Registration number: $this->registration_number ;\n
        Vian Received: " . ($this->isViandReceived ? 'Yes' : 'No') . "\n  ";
    }

    function get_viand($possible_min_viand_amount, $possible_max_viand_amount)
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

    function __construct()
    {
        static $animal_kind = 'cow';
        parent::__construct($animal_kind);
    }

    function get_viand($possible_min_viand_amount = 8, $possible_max_viand_amount = 12)
    {

        return parent::get_viand($possible_min_viand_amount, $possible_max_viand_amount);
    }
}


class chicken extends animal
{

    function __construct()
    {
        static $animal_kind = 'chicken';
        parent::__construct($animal_kind);
    }

    function get_viand($possible_min_viand_amount = 0, $possible_max_viand_amount = 1)
    {
        return parent::get_viand($possible_min_viand_amount, $possible_max_viand_amount);
    }
}
