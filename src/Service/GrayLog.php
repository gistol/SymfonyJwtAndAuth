<?php

namespace App\Service;

class GrayLog
{
    private static $instance;
    private $arFields = [];
    private $facility = '';
    private $message = '';
    private $arFacilityFields = [];

    public function addField($fieldName, $fieldValue)
    {
        $this->arFields[$fieldName] = $fieldValue;

        if (!empty($this->facility))
        {
            $this->arFacilityFields[$this->facility] = $this->arFields;
        }

        return self::$instance;
    }

    public function deleteField($fieldName)
    {
        if (!empty($this->facility))
        {
            unset($this->arFacilityFields[$this->facility][$fieldName]);
        }

        unset($this->arFields[$fieldName]);
        return self::$instance;
    }

    public function setMessage($message)
    {
        if (!empty($this->facility))
        {
            $this->arFacilityFields[$this->facility]['message'] = $message;
        }

        $this->message = $message;
        return self::$instance;
    }

    public function setFacility($facility)
    {
        $this->facility = $facility;
        return self::$instance;
    }

    public function send($arAdditional = [], $type = 'info')
    {
        if (empty($this->facility) || empty($this->message))
            return false;

        $arAdditional = array_merge($arAdditional, $this->arFields);
        self::toGL($this->facility, $this->message, $arAdditional, $type);
    }

    public static function toGL($facility, $shortMessage, $arAdditionalData = [], $logLevel = \Psr\Log\LogLevel::INFO)
    {
        if (empty($facility) || empty($shortMessage))
            return false;

        $fullMessage = false;
        if (!empty($arData['full_message']))
        {
            $fullMessage = $arData['full_message'];
            unset($arData['full_message']);
        }

        $url = 'syslog2.synergy.ru';

        try
        {
            $transport = new \Gelf\Transport\UdpTransport($url, 12201, 4000);
            $publisher = new \Gelf\Publisher();
            $publisher->addTransport($transport);

            $message = new \Gelf\Message();
            $message
                ->setShortMessage($shortMessage)
                ->setFacility($facility)
                ->setLevel($logLevel);

            if (!empty($fullMessage))
            {
                $message->setFullMessage($fullMessage);
            }

            foreach ($arAdditionalData as $key => $value)
            {
                $message->setAdditional($key, $value);
            }

            $publisher->publish($message);

        } catch (\Exception $exception) { }
    }

    public static function getInstance()
    {
        if (empty(self::$instance))
        {
            self::$instance = new GrayLog();
        }

        return self::$instance;
    }

    /**
     * Метод для установки предыдущих полей Facility
     * @param $facility
     */
    public function setFacilityFields($facility)
    {

        self::setFacility($facility);

        if (!empty($this->arFacilityFields[$facility]))
        {
            $arData = $this->arFacilityFields[$facility];

            if(!empty($arData['message'])){
                self::setMessage($arData['message']);
                unset($arData['message']);
            }

            $this->arFields = $arData;
        }

        return self::$instance;
    }
}