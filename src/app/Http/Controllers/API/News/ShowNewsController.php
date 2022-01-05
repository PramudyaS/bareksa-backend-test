<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\QueryBuilders\NewsMasterQuery;
use Illuminate\Http\Request;

class ShowNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        return response()->json([
            'message'   => 'Show detail news',
            'data'      => (new NewsMasterQuery())->findOrFail($id)
        ]);
    }
}
