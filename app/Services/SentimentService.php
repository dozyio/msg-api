<?php

namespace App\Services;

use App\Msg;
use Exception;
use Illuminate\Support\Facades\Log;
use Error;
use Illuminate\Support\Facades\App;

class SentimentService
{
    /**
     * Perform sentiment analysis using AWS comprehend
     */
    public function analyse(string $text): ?int
    {
        try {
            $awsClient = App::make('aws')->createClient('comprehend');
            $sentiment = $awsClient->detectSentiment(['LanguageCode' => 'en', 'Text' => $text]);
            if ($sentiment) {
                switch($sentiment['Sentiment']) {
                    case 'POSITIVE':
                        return Msg::SENTIMENT_POSITIVE;

                    case 'NEGATIVE':
                        return Msg::SENTIMENT_NEGATIVE;

                    case 'NEUTRAL':
                        return Msg::SENTIMENT_NEUTRAL;

                    case 'MIXED':
                        return Msg::SENTIMENT_MIXED;

                    default:
                        throw new Error("Unknown sentiment type");
                }
            }
            throw new Error("Could not get sentiment");
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }

        return null;
    }
}
