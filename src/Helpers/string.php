<?php

if (! function_exists('replaceStringParameters')) {
    function replaceStringParameters(string $string, array $parameters = []): string
    {
        foreach ($parameters as $parameterKey => $parameterValue) {
            $string = str_replace('{'.$parameterKey.'}', $parameterValue, $string);
        }

        return $string;
    }
}
