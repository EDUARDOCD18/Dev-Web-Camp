<?php

namespace Model;

class hora extends ActiveRecord
{
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'hora'];

    public $id;
    public $hora;
}
