<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/6
 * Time: 下午4:37
 */

namespace App\Http\Controllers\Kong;

use App\Kong\Client\Kong\Service\Traits\AddTraits;
use App\Kong\Client\Kong\Service\Traits\InfoTraits;
use App\Kong\Client\Kong\Service\Traits\ListsTraits;
use App\Kong\Client\Kong\Service\Traits\UploadTraits;

class ServiceController extends BaseController
{
    use ListsTraits, AddTraits, InfoTraits, UploadTraits;
}