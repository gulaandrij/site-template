<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class ApiValidationException
 *
 * @package App\Exception
 */
class ApiValidationException extends HttpException
{

    /**
     *
     * @var array
     */
    public $httpData;

    /**
     *
     * @var int|string
     */
    public $httpCode;

    /**
     * ApiProblemException constructor.
     *
     * @param int|string              $httpCode
     * @param ConstraintViolationList $httpData
     * @param \Exception              $previous
     * @param array                   $headers
     * @param int                     $code
     */
    public function __construct($httpCode = Response::HTTP_INTERNAL_SERVER_ERROR, ?ConstraintViolationList $httpData = null, ?\Exception $previous = null, $headers = [], $code = 0)
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
     * @return array
     */
    public function getHttpData(): array
    {
        $errors = $grouped = [];
        foreach ($this->httpData as $e) {
            $key = str_replace(['][', ']', '['], ['.', '', ''], $e->getPropertyPath());
            $errors[$key][] = $e->getMessage();
        }
        foreach ($errors as $k => $v) {
            $this->arrayModifier($grouped, $k, $v);
        }
        return $grouped;
    }

    /**
     *
     * @param array  $array
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    private function arrayModifier(&$array, $key, $value)
    {
        if (!$key) {
            return $value;
        }

        $keys = explode('.', $key);
        // @codingStandardsIgnoreLine
        while (\count($keys) > 1) {
            $key = array_shift($keys);
            if (!isset($array[$key]) || !\is_array($array[$key])) {
                $array[$key] = [];
            }
            $array = &$array[$key];
            unset($array[$key]);
        }
        $array[array_shift($keys)] = $value;
        return $array;
    }
}
