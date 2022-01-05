<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\Actions\DeleteNewsAction;
use Illuminate\Http\Request;

class DeleteNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id,DeleteNewsAction $action)
    {
        $action->execute($id);
        return response()->json([
            'message'   => 'Succes Delete News'
        ],204);
    }
}
