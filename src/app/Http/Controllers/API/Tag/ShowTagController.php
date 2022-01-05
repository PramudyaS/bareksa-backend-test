<?php

namespace App\Http\Controllers\API\Tag;

use App\Http\Controllers\Controller;
use Domain\Tag\QueryBuilders\TagMasterQuery;
use Illuminate\Http\Request;

class ShowTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        return response()->json([
            'message'   => 'Show detail tag',
            'data'      => (new TagMasterQuery())->findOrFail($id)
        ]);
    }
}
