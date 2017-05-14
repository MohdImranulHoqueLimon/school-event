<?php

namespace App\Http\Responses;


class SimpleResponse
{
    /** @var string true/false */
    public $success;
    /** @var string error message */
    public $error;
    /** @var numeric */
    public $status_code;
    /** @var object */
    public $result;

    public function __construct($success = false, $error = '', $result = '', $errorCode = '')
    {
        $this->success = $success;
        $this->error = $error;
        $this->result = $result;
        $this->status_code = $errorCode;
    }

    /**
     * Set Error description
     *
     * @param string $error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Get Error description
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set error code
     *
     * @param $status_code
     *
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
        return $this;
    }

    /**
     * Get error code
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Set Result object
     *
     * @param $result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     * Get Result object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set success status
     *
     * @param bool $success
     *
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * Get success status
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }
}
