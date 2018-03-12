<?php

namespace JdPowered\Geofox\Response;

use JdPowered\Geofox\Enum\ReturnCode;
use JdPowered\Geofox\Json;

class Base
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var \JdPowered\Geofox\Enum\ReturnCode
     */
    protected $returnCode;

    /**
     * @var string|null
     */
    protected $errorText;

    /**
     * @var string|null
     */
    protected $errorDevInfo;

    /**
     * Create a new instance and fill it from a JSON object.
     *
     * @param int $status
     * @param \JdPowered\Geofox\Json $data
     */
    public function __construct(int $status, Json $data)
    {
        $this->setStatus($status)
            ->setReturnCode($data->returnCode)
            ->setErrorText($data->errorText)
            ->setErrorDevInfo($data->errorDevInfo);
    }

    /**
     * Get the status code.
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the status code.
     *
     * @param int $status
     * @return \JdPowered\Geofox\Response\Base
     */
    protected function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the return code.
     *
     * @return \JdPowered\Geofox\Enum\ReturnCode
     */
    public function getReturnCode(): ReturnCode
    {
        return ReturnCode::get($this->returnCode);
    }

    /**
     * Set the return code.
     *
     * @param string $returnCode
     * @return \JdPowered\Geofox\Response\Base
     */
    protected function setReturnCode(string $returnCode): self
    {
        $this->returnCode = ReturnCode::get($returnCode);

        return $this;
    }

    /**
     * Get the error text.
     *
     * @return null|string
     */
    public function getErrorText(): ?string
    {
        return $this->errorText;
    }

    /**
     * Set the error text.
     *
     * @param string|null $errorText
     * @return \JdPowered\Geofox\Response\Base
     */
    protected function setErrorText(string $errorText = null): self
    {
        $this->errorText = $errorText;

        return $this;
    }

    /**
     * Get the error dev info.
     *
     * @return null|string
     */
    public function getErrorDevInfo(): ?string
    {
        return $this->errorDevInfo;
    }

    /**
     * Set the error dev info.
     *
     * @param string|null $errorDevInfo
     * @return \JdPowered\Geofox\Response\Base
     */
    protected function setErrorDevInfo(string $errorDevInfo = null): self
    {
        $this->errorDevInfo = $errorDevInfo;

        return $this;
    }
}
