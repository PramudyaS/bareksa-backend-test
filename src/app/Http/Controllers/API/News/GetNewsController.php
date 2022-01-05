<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\Models\News;
use Domain\News\QueryBuilders\NewsBuilder;
use Domain\News\QueryBuilders\NewsMasterQuery;
use Illuminate\Http\Request;

class GetNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = (new NewsMasterQuery($request))
            ->allowFilterByStatus();

        return response()->json([
            'message'  => 'Succes show news data',
            'data'     => $query
        ]);
    }
}
