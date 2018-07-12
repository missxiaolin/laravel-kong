<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/9
 * Time: 上午9:30
 */

namespace App\Http\Controllers\Kong;


use App\Kong\Client\Kong\Api\Traits\AddTraits;
use App\Kong\Client\Kong\Api\Traits\DeleteTraits;
use App\Kong\Client\Kong\Api\Traits\InfoTraits;
use App\Kong\Client\Kong\Api\Traits\ListsTraits;
use App\Kong\Client\Kong\Api\Traits\UploadTraits;

class ApiController extends BaseController
{
    use ListsTraits, AddTraits, UploadTraits, InfoTraits, DeleteTraits;
}