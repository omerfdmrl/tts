<?php

/**
 * Google Tts Api
 *
 * This is simple Google Tts Api Class
 *
 *
 * @link www.omerfd,com
 * @since 1.0.0
 *
 * @version 1.0.0
 *
 * @package Omerfdmrl\Tts
 * 
 * @licence: The MIT License (MIT) - Copyright (c) - http://opensource.org/licenses/MIT
 */


namespace Omerfdmrl\Tts;

use GuzzleHttp\Client;

class Tts
{
    /**
     * @var string $apiKey
     */
    private static string $apiKey;

    /**
     * @var string|int $text
     */
    private static string|int $text;

    /**
     * @var string $languageCode
     */
    private static string $languageCode = 'en-US';

    /**
     * @var string $voiceName
     */
    private static string $voiceName = 'en-US-Wavenet-F';

    /**
     * @var string $encoding
     */
    private static string $encoding = 'MP3';

    /**
     * @var int|float $pitch
     */
    private static int|float $pitch = 0.00;

    /**
     * @var int|float $speakingRate
     */
    private static int|float $speakingRate = 1.00;

    /**
     * @var string $savePath
     */
    private static string $savePath = 'tts.mp3';

    /**
     * @var $http
     */
    protected static $http;

    /**
     * @var string|null $error
     */
    protected static string|null $error = '';

    public function __construct()
    {
        self::$http = new Client();
    }

    /**
     * Set Api Key
     * 
     * @param string $api
     */
    public static function setApi(string $api): void
    {
        self::$apiKey = $api;
    }

    /**
     * Set Text
     * 
     * @param string|int $text
     */
    public static function setText(string|int $text): void
    {
        self::$text = $text;
    }

    /**
     * Set Language Code
     * 
     * @param string $languageCode
     */
    public static function setLanguageCode(string $languageCode): void
    {
        self::$languageCode = $languageCode;
    }

    /**
     * Set Voice Name
     * 
     * @param string $voiceName
     */
    public static function setVoiceName(string $voiceName): void
    {
        self::$voiceName = $voiceName;
    }

    /**
     * Set Encoding
     * 
     * @param string $encoding
     */
    public static function setEncoding(string $encoding): void
    {
        self::$encoding = $encoding;
    }

    /**
     * Set Pitch
     * 
     * @param int|float $pitch
     */
    public static function setPitch(int|float $pitch): void
    {
        self::$pitch = $pitch;
    }

    /**
     * Set Speaking Rate
     * 
     * @param int|float $speakingRate
     */
    public static function setSpeakingRate(int|float $speakingRate): void
    {
        self::$speakingRate = $speakingRate;
    }

    /**
     * Set Save Path
     * 
     * @param string $savePath
     */
    public static function setSavePath(string $savePath): void
    {
        self::$savePath = $savePath;
    }

    /**
     * Get Audio From Google Tts
     */
    public static function get(): void
    {
        $requestData = [
            'input' =>[
                'text' => self::$text
            ],
            'voice' => [
                'languageCode' => self::$languageCode,
                'name' => self::$voiceName
            ],
            'audioConfig' => [
                'audioEncoding' => self::$encoding,
                'pitch' => self::$pitch,
                'speakingRate' => self::$speakingRate
            ]
        ];

        try {
            $response = self::$http->request('POST', 'https://texttospeech.googleapis.com/v1beta1/text:synthesize?key=' . self::$apiKey, [
            'json' => $requestData
        ]);
        } catch (\Exception $e) {
            self::$error = $e->getMessage();
        }
        $fileData = json_decode($response->getBody()->getContents(), true);
        file_put_contents(self::$savePath, base64_decode($fileData['audioContent']));
    }

    /**
     * Get Error
     */
    public static function error(): string|null
    {
        return self::$error;
    }
}