<?php

namespace App\Repository\Eloquent;

use App\Models\Advertisement;
use App\Repository\AdvertisementRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class AdvertisementRepository implements AdvertisementRepositoryInterface
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
    public function __construct(Advertisement $model)
    {
        $this->model = $model;
    }

    /**
     * Filter model by type.
     *
     * @return Collection
     */
  public function filter(): Collection
  {
      return app(Pipeline::class)
          ->send($this->model)
          ->through([
              \App\Filters\Tag::class,
              \App\Filters\Category::class
          ])
          ->thenReturn()
          ->get();
  }
}
