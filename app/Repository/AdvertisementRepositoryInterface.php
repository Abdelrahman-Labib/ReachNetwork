<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface AdvertisementRepositoryInterface
{
    /**
     * Filter model by type.
     *
     * @return Collection
     */
    public function filter(): Collection;
}
