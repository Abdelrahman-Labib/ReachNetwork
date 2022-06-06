<?php

namespace App\Repository\Eloquent;

use App\Models\Tag;
use App\Repository\TagRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
}
