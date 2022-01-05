<?php

namespace App\Http\Controllers\API\Tag;

use App\Http\Controllers\Controller;
use Domain\Tag\Actions\DeleteTagAction;
use Illuminate\Http\Request;

class DeleteTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id,DeleteTagAction $action)
    {
        $action->execute($id);
        return response()->json([
            'message'   => 'Succes delete tag',
        ],204);
    }
}
