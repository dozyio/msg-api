<?php

namespace App\Models;

use App\Msg;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'sentiment'
    ];

    protected $hidden = [
        'updated_at'
    ];

    /**
     * The sentiment is stored as an integer in the DB, but we return a text emoji via this accessor
     */
    public function getSentimentAttribute(int $value): string
    {
        switch($value) {
            case Msg::SENTIMENT_POSITIVE:
                return ':)';

            case Msg::SENTIMENT_NEGATIVE:
                return ':(';

            case Msg::SENTIMENT_NEUTRAL:
                return ':|';

            case Msg::SENTIMENT_MIXED:
                return ':/';

            default:
                return ':P';
        }
    }
}
