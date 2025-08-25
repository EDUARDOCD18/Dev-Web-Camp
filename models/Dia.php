<?php

namespace Model;

class dia extends ActiveRecord
{
    protected static $tabla = 'dias';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}
