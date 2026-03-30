<?php

namespace src\share\Http\HttpStatus;

enum HttpStatus: int
{
    case SUCCESS = 200;
    case BAD_REQUEST = 400;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case NOT_ACCEPTABLE = 406;
    case PROXY_AUTHENTICATION_REQUIRED = 407;
    case REQUEST_TIMEOUT = 408;
    case CONFLICT = 409;
    case GONE = 410;
    case LENGTH_REQUIRED = 411;
    case PRECONDITION_FAILED = 412;
    case REQUEST_ENTITY_TOO_LARGE = 413;
    case REQUEST_URI_TOO_LARGE = 414;
    case UNSUPPORTED_MEDIA_TYPE = 415;
    case UNPROCESSABLE_ENTITY = 422;
    case LOCKED = 429;
    case FAILED_DEPENDENCY = 500;

    public function message(): string
    {
        return match ($this) {
            self::NOT_FOUND => 'Page not found',
            self::BAD_REQUEST => 'Bad request',
            self::FORBIDDEN => 'Forbidden',
            self::NOT_ACCEPTABLE => 'Not acceptable',
            self::METHOD_NOT_ALLOWED => 'Method not allowed',
            self::CONFLICT => 'Conflict',
            self::GONE => 'Gone',
            self::LENGTH_REQUIRED => 'Length required',
            self::PRECONDITION_FAILED => 'Precondition failed',
            self::REQUEST_ENTITY_TOO_LARGE => 'Request entity too large',
            self::REQUEST_URI_TOO_LARGE => 'Request URI too large',
            self::UNSUPPORTED_MEDIA_TYPE => 'Unsupported media type',
            self::UNPROCESSABLE_ENTITY => 'Unprocessable entity',
            self::LOCKED => 'Locked',
            self::FAILED_DEPENDENCY => 'Failed dependency',
            default => 'OK',
        };
    }
}