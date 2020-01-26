<?php

class HttpInvalidInputException extends HttpException
{
    /**
     * @return mixed
     */
    public function response()
    {
        $response = Request::forge('error/invalid')
            ->execute(array($this->getMessage()))->response();
        return $response;
    }
}
