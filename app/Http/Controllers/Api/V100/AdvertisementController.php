<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Repository\AdvertisementRepositoryInterface;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    private $advertisementRepository;

    public function __construct(AdvertisementRepositoryInterface $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }

    public function __invoke(Request $request)
    {
        $advertisements = $this->advertisementRepository->filter();

        return response()->json($advertisements);
    }
}
