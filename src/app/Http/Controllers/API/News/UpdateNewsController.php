<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\Actions\UpdateNewsAction;
use Domain\News\Requests\NewsRequest;
use Illuminate\Http\Request;

class UpdateNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id,NewsRequest $request,UpdateNewsAction $action)
    {
        return response()->json([
            'message'   => 'Success update news',
            'data'      => $action->execute($id,$request)
        ]);
    }
}
