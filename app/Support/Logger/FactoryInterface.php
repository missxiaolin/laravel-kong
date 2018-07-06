<?php

namespace App\Support\Logger;

interface FactoryInterface
{
    /**
     * @param string $command redis command in lower case
     * @return Command
     */
    public function getLogger($name);
}