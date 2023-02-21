<?php

namespace Sv1fT\Exchange1C\Interfaces;

interface CatalogInterface
{
    public function checkauth();

    public function init();

    public function file();

    public function import();

    public function query();

}
