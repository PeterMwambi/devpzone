<?php

namespace Views\Includes\Widgets\Forms;

use Exception;

use Models\Components\FormComponent;


class Form extends FormComponent
{

    public function runSetup(array $attributes = [])
    {
        parent::render($attributes);
    }


}