<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午5:01
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pid', 'name', 'route', 'type'];

    protected $table = 'router';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}