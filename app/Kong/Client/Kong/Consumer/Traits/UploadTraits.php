<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:16
 */

namespace App\Kong\Client\Kong\Consumer\Traits;

use App\Kong\Client\Kong\Routes\Form\UploadForm;
use App\Kong\Client\Kong\Routes\Request\UploadRequest;
use App\Kong\Client\Kong\Routes\Response\UploadResponse;
use App\Kong\Manager\Kong;
use App\Src\Basic\Filter;

trait UploadTraits
{
    public function upload(Filter $filter, UploadForm $form, UploadRequest $request, UploadResponse $response, Kong $manager)
    {
    }
}