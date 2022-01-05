<?php

namespace Domain\Topic\Actions;

use Domain\Topic\Models\Topic;
use Illuminate\Http\Request;

class CreateTopicAction
{
    public function execute(Request  $request)
    {
        $topic = new Topic();
        $topic->title   = $request->title;
        $topic->save();

        return $topic;
    }
}
