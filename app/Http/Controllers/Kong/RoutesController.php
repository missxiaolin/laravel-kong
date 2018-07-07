<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:13
 */

namespace App\Http\Controllers\Kong;


use App\Kong\Client\Kong\Routes\Traits\AddTraits;
use App\Kong\Client\Kong\Routes\Traits\DeleteTraits;
use App\Kong\Client\Kong\Routes\Traits\InfoTraits;
use App\Kong\Client\Kong\Routes\Traits\ListsTraits;
use App\Kong\Client\Kong\Routes\Traits\UploadTraits;

class RoutesController extends BaseController
{
    use  AddTraits, ListsTraits, InfoTraits, DeleteTraits, UploadTraits;
}