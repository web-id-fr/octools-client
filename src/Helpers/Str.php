<?php

namespace WebId\OctoolsClient\Helpers;

class Str
{
    public static function buildStringWithParameters(string $string, array $parameters = []): string
    {
        foreach ($parameters as $parameterKey => $parameterValue) {
            $string = str_replace('{'.$parameterKey.'}', $parameterValue, $string);
        }

        return $string;
    }
}
