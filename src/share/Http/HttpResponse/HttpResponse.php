<?php

namespace src\share\Http\HttpResponse;

use src\share\Http\HttpStatus\HttpStatus;

class HttpResponse
{
    public function __construct(
        public readonly HttpStatus $status,
        public string|null $message = null,
    )
    {
        if ($message === null) {
            $this->message = $this->status->message();
        }
    }
}