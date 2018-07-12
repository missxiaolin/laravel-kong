<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Api\Traits;


use App\Kong\Client\Kong\Api\Form\DeleteForm;
use App\Kong\Client\Kong\Api\Request\DeleteRequest;
use App\Kong\Client\Kong\Api\Response\DeleteResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait DeleteTraits
{
    /**
     * @param Filter $filter
     * @param DeleteForm $form
     * @param DeleteRequest $request
     * @param DeleteResponse $response
     * @param Kong $manager
     * @return mixed
     */
    public function delete(Filter $filter, DeleteForm $form, DeleteRequest $request, DeleteResponse $response, Kong $manager)
    {
        return $this->run($filter, $form, $request, $response, $manager);
    }
}