<?php

namespace App\Src\Repository;

use App\Src\Models\Node;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class NodeRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Node::class;
    }

    /**
     * 保存节点
     * @param $data
     * @return Node
     */
    public static function setNode($data)
    {
        $attributes = [
            'name' => array_get($data, 'name'),
            'url' => array_get($data, 'url'),
        ];
        $model = new Node();
        $model->fill($attributes);
        $model->save();
        return $model;
    }

    public function getNodes()
    {
        return $this->model->all();
    }
}