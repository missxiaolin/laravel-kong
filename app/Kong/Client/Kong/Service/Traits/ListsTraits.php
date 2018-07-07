<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:42
 */

namespace App\Kong\Client\Kong\Service\Traits;

use App\Kong\Client\Kong\Service\Form\ListForm;
use App\Kong\Client\Kong\Service\Request\ListsRequest;
use App\Kong\Client\Kong\Service\Response\ListsResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait ListsTraits
{
    public function lists(Filter $filter, ListForm $form, ListsRequest $request, ListsResponse $response, Kong $manager)
    {
        return $this->run($filter, $form, $request, $response, $manager);
    }
}