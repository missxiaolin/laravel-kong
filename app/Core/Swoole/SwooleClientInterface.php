<?php
namespace App\Core\Swoole;

interface SwooleClientInterface
{
    public function handle($data);
}