<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V100\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Repository\TagRepositoryInterface;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $categories = TagResource::collection($this->tagRepository->index());

        return response()->json($categories);
    }

    public function store(TagRequest $request)
    {
        $this->tagRepository->create($request->validated());

        return response()->json('Success');
    }

    public function show(Tag $tag)
    {
        return response()->json(new TagResource($this->tagRepository->show($tag->id)));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $this->tagRepository->update($tag->id, $request->validated());

        return response()->json('Success');
    }

    public function destroy(Tag $tag)
    {
        $this->tagRepository->delete($tag->id);

        return response()->json('Success');
    }
}
