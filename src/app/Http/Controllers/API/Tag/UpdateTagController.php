<?php

namespace App\Http\Controllers\API\Tag;

use App\Http\Controllers\Controller;
use Domain\Tag\Actions\UpdateTagAction;
use Domain\Tag\Requests\TagRequest;
use Illuminate\Http\Request;

class UpdateTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id,TagRequest $request,UpdateTagAction $action)
    {
        return response()->json([
            'message'   => 'Success update tag',
            'data'      => $action->execute($id,$request)
        ]);
    }
}
