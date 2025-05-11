<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrailerCategory\TrailerCategoryIndexRequest;
use App\Http\Resources\TrailerCategoryResource;
use App\Queries\TrailerCategoryQueryBuilder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TrailerCategoryController extends Controller
{
    public function index(TrailerCategoryIndexRequest $request, TrailerCategoryQueryBuilder $query): AnonymousResourceCollection
    {
        return TrailerCategoryResource::collection($query->paginate($request->perPage()));
    }
}
