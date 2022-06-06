<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\AdvertiserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdvertiserRepository implements AdvertiserRepositoryInterface
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
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function showAdvertiserAdvertisement(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * Get advertisers has advertisements tomorrow.
     * @return Collection
     */
    public function tomorrowAdvertisement()
    {
        return $this->model->WithWhereHas('advertisements', fn($query) => $query->tomorrow())->get();
    }
}
