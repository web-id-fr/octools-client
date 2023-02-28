<?php

return [
    /**
     * App token require to call Octools api
     */
    'application_token' => env('OCTOOLS_CLIENT_APP_TOKEN', ''),

    /**
     * Endpoint url, production by default. Change it only for development.
     */
    'octools_api_url' => env('OCTOOLS_API_URL', 'https://app.octools.io/api')
];
