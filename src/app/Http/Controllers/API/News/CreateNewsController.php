<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\Actions\CreateNewsAction;
use Domain\News\Requests\NewsRequest;
use Illuminate\Http\Request;

class CreateNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(NewsRequest $request,CreateNewsAction $action)
    {
        return response()->json([
            'message'   => 'Success Create News',
            'data'      => $action->execute($request)
        ],201);
    }
}
