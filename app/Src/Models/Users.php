<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:47
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'mobile', 'password', 'token', 'status'];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id', 'id', 'id');
    }
}