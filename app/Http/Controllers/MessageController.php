<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageStoreRequest;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index(): Collection
    {
        return Message::all();
    }

    /**
     * Store a newly created message.
     *
     * By using a a custom request (MessageStoreRequest), controllers can be thinner
     * as validation and authorisation are handled within the request handler.
     *
     * Use method DI to inject the MessageService.
     */
    public function store(MessageStoreRequest $request, MessageService $messageService): Response
    {
        $result = $messageService->store($request);

        if ($result) {
            return response()->created($result);
        }

        abort(Response::HTTP_BAD_REQUEST , __('message.could_not_save_message'));
    }

    /**
     * Display the specified message.
     *
     * Return the message via route model binding
     */
    public function show(Message $message): Message
    {
        return $message;
    }
}
