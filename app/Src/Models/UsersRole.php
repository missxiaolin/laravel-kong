<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午3:40
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];

    protected $table = 'user_role';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}