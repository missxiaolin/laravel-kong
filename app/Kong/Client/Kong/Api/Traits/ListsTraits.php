<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Api\Traits;

use App\Kong\Client\Kong\Api\Request\ListsRequest;
use App\Kong\Client\Kong\Api\Response\ListsResponse;
use App\Kong\Client\Kong\Api\Form\ListsForm;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait ListsTraits
{
    /**
     * @param Filter $filter
     * @param ListsForm $form
     * @param ListsRequest $request
     * @param ListsResponse $response
     * @param Kong $manager
     * @return mixed
     */
    public function lists(Filter $filter, ListsForm $form, ListsRequest $request, ListsResponse $response, Kong $manager)
    {
        return $this->run($filter, $form, $request, $response, $manager);
    }
}