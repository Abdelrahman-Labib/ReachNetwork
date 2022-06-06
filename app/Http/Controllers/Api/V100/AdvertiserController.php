<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertiserResource;
use App\Models\User;
use App\Repository\AdvertiserRepositoryInterface;

class AdvertiserController extends Controller
{
    private $advertiserRepository;

    public function __construct(AdvertiserRepositoryInterface $advertiserRepository)
    {
        $this->advertiserRepository = $advertiserRepository;
    }

    public function __invoke(User $user)
    {
        $advertisements = new AdvertiserResource(
            $this->advertiserRepository->showAdvertiserAdvertisement(
                $user->id,
                ['*'],
                ['advertisements']
            )
        );

        return response()->json($advertisements);
    }
}
