<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Plugins\Traits;

use App\Kong\Client\Kong\Routes\Form\InfoForm;
use App\Kong\Client\Kong\Routes\Request\InfoRequest;
use App\Kong\Client\Kong\Routes\Response\InfoResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait InfoTraits
{
    /**
     * @param Filter $filter
     * @param InfoForm $form
     * @param InfoRequest $request
     * @param InfoResponse $response
     * @param Kong $manager
     * @return mixed
     */
    public function info(Filter $filter, InfoForm $form, InfoRequest $request, InfoResponse $response, Kong $manager)
    {
        return $this->run($filter, $form, $request, $response, $manager);
    }
}