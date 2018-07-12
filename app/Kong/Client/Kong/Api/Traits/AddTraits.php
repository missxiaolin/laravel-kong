<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Api\Traits;


use App\Kong\Client\Kong\Api\Form\AddForm;
use App\Kong\Client\Kong\Api\Request\AddRequest;
use App\Kong\Client\Kong\Api\Response\AddResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait AddTraits
{
    /**
     * @param Filter $filter
     * @param AddForm $form
     * @param AddRequest $request
     * @param AddResponse $response
     * @param Kong $manager
     * @return mixed
     */
    public function add(Filter $filter, AddForm $form, AddRequest $request, AddResponse $response, Kong $manager)
    {
        return $this->run($filter, $form, $request, $response, $manager);
    }
}