<?php

namespace Naviware\Tidings;

class TidingsConfig
{
    /**
     * Constants for the client to connect to mNotify
    */
    public string $baseEndPoint;
    public string $apiKey;
    public string $senderID;
    public string $specificService;
    public string $fullRequestURL;
    public int $serviceID;
    public int $retryTidings;
    public int $retryInterval;

    public function __construct(){
        if($this->configNotPublished()) {
            return $this->warn("Please publish the config file by running: " .
                "\"php artisan vendor:publish --tag=tidings-config\""
            );
        }

        $this->fullRequestURL = "";
        $this->baseEndPoint = config('tidings.base_endpoint');
        $this->apiKey = config('tidings.api_key');
        $this->senderID = config('tidings.sender_id');
        $this->retryTidings = config('tidings.retryTidings');
        $this->retryInterval = config('tidings.retry_interval');
    }

    /**
     * @return bool
     * checks if config file is published
     */
    public function configNotPublished(): bool
    {
        return is_null(config("tidings"));
    }

    /**
     * @return string
     */
    public function getBaseEndPoint(): string
    {
        return $this->baseEndPoint;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getSenderID(): string
    {
        return $this->senderID;
    }

    /**
     * @return string
     */
    public function getSpecificService(): string
    {
        return $this->specificService;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->serviceID;
    }
}