<?php

namespace App\Services;

use App\Http\Requests\MessageStoreRequest;
use App\Models\Message;

class MessageService
{
    /**
     * Perform sentiment analysis and save the new message
     */
    function store(MessageStoreRequest $request): ?message
    {
        $sentimentService = resolve(SentimentService::class);

        $sentiment = $sentimentService->analyse($request->input('message'));

        return Message::create([
            'message' => $request->input('message'),
            'sentiment' => $sentiment
        ]);
    }
}
