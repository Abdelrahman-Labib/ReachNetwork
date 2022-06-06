<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AdvertiserRepositoryInterface
{
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
    ): ?Model;

    /**
     * Get advertisers has advertisements tomorrow.
     *
     * @return Collection
     */
    public function tomorrowAdvertisement();
}
