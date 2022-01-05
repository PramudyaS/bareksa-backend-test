<?php

namespace App\Http\Controllers\API\Tag;

use App\Http\Controllers\Controller;
use Domain\Tag\Models\Tag;
use Domain\Tag\QueryBuilders\TagMasterQuery;
use Illuminate\Http\Request;

class GetTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(?Request $request = null)
    {
        $query = (new TagMasterQuery($request));

        return response()->json([
            'message'   => 'Success show tags data',
            'data'      => $query->all()
        ]);
    }
}
