<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/2
 * Time: 上午11:27
 */

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url'];

    protected $table = 'nodes';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}