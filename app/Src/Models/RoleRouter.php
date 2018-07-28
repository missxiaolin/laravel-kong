<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/28
 * Time: 下午9:44
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class RoleRouter extends Model
{
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'router_id'];

    protected $table = 'role_router';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}