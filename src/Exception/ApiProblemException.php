<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ApiProblemException
 *
 * @package App\Exception
 */
class ApiProblemException extends HttpException
{

    /**
     *
     * @var string
     */
    public $httpData;

    /**
     *
     * @var int
     */
    public $httpCode;

    /**
     * ApiProblemException constructor.
     *
     * @param int        $httpCode
     * @param string     $httpData
     * @param \Exception $previous
     * @param array      $headers
     * @param int        $code
     */
    public function __construct(int $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR, $httpData = '', ?\Exception $previous = null, $headers = [], $code = 0)
    {
        $this->httpCode = $httpCode;
        $this->httpData = $httpData;
        parent::__construct($httpCode, null, $previous, $headers, $code);
    }

    /**
     *
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     *
     * @return string
     */
    public function getHttpData(): string
    {
        return $this->httpData;
    }
}
