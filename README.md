# Msg-api - Sentiment analysis with Laravel and AWS Comprehend

A Laravel example project demoing sentiment analysis using AWS comprehend via Larvel API.
A lovely text emoji is returned showing the sentiment of the input text.

# Usage

Configure your .env file, ensure to set a database and AWS credentials.

## Running the server
```
php artisan migrate:fresh && php artisan serve
```

## API

### Perform analysis
```
curl -i -H "Accept: application/json" -H "Content-Type: application/json" --request POST --data '{"name":"test", "message":"Do you like our owl?"}' http://127.0.0.1:8000/api/messages
```

### View all messages
```
curl -i -H "Accept: application/json" http://127.0.0.1:8000/api/messages
```

### View a specific message
```
curl -i -H "Accept: application/json" http://127.0.0.1:8000/api/messages/1
```
