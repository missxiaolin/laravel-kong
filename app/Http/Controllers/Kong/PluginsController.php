<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/9
 * Time: 上午9:30
 */

namespace App\Http\Controllers\Kong;


use App\Kong\Client\Kong\Plugins\Traits\AddTraits;
use App\Kong\Client\Kong\Plugins\Traits\DeleteTraits;
use App\Kong\Client\Kong\Plugins\Traits\InfoTraits;
use App\Kong\Client\Kong\Plugins\Traits\ListsTraits;
use App\Kong\Client\Kong\Plugins\Traits\UploadTraits;

class PluginsController extends BaseController
{
    use AddTraits, ListsTraits, UploadTraits, DeleteTraits, InfoTraits;
}