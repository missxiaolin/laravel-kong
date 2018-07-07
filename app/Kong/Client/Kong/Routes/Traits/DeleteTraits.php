<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Routes\Traits;


use App\Kong\Client\Kong\Routes\Form\AddForm;
use App\Kong\Client\Kong\Routes\Request\AddRequest;
use App\Kong\Client\Kong\Routes\Response\AddResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait DeleteTraits
{
    public function add(Filter $filter, AddForm $form, AddRequest $request, AddResponse $response, Kong $manager)
    {
    }
}