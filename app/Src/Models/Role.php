<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午3:19
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_name', 'role_desc'];

    protected $table = 'role';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}