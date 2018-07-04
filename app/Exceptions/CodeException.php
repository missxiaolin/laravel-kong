<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/11
 * Time: 下午1:45
 */

namespace App\Exceptions;

use App\Core\Enums\ErrorCode;
use Exception;
use Throwable;

class CodeException extends Exception
{
    public $errorCode;

    /**
     * CodeException constructor.
     * @param int $code
     * @param null $message
     * @param Throwable|null $previous
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function __construct($code = 0, $message = null, Throwable $previous = null)
    {
        $this->errorCode = $code;
        if ($message === null) {
            $message = ErrorCode::getMessage($code);
        }

        if (!is_int($code)) {
            $code = 400;
        }

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }
}