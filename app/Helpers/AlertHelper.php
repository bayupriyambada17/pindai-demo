<?php

namespace App\Helpers;

class AlertHelper
{
    public static function notification($component, $typeAlert, $message)
    {
        $component->alert($typeAlert, $message, [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public static function success($component, $message)
    {
        self::notification($component, 'success', $message);
    }

    public static function error($component, $message)
    {
        self::notification($component, 'error', $message);
    }

    public static function warning($component, $message)
    {
        self::notification($component, 'warning', $message);
    }

    public static function info($component, $message)
    {
        self::notification($component, 'info', $message);
    }
}
