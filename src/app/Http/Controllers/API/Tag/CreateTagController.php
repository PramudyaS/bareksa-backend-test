<?php

namespace App\Http\Controllers\API\Tag;

use App\Http\Controllers\Controller;
use Domain\Tag\Actions\CreateTagAction;
use Domain\Tag\Requests\TagRequest;
use Illuminate\Http\Request;

class CreateTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Domain\Tag\Requests\TagRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(TagRequest $request,CreateTagAction $action)
    {
        return response()->json([
            'message'   => 'Success create new tag',
            'data'      => $action->execute($request)
        ],201);
    }
}
