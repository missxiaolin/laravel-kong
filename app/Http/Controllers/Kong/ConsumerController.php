<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/9
 * Time: 上午9:31
 */

namespace App\Http\Controllers\Kong;


use App\Kong\Client\Kong\Consumer\Traits\AddTraits;
use App\Kong\Client\Kong\Consumer\Traits\DeleteTraits;
use App\Kong\Client\Kong\Consumer\Traits\InfoTraits;
use App\Kong\Client\Kong\Consumer\Traits\ListsTraits;
use App\Kong\Client\Kong\Consumer\Traits\UploadTraits;

class ConsumerController extends BaseController
{
    use UploadTraits, AddTraits, ListsTraits, DeleteTraits, InfoTraits;
}