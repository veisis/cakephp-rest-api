<?php

if (empty($response[$responseFormat['resultKey']])) {
    $response[$responseFormat['resultKey']] = [
        $responseFormat['errorKey'] => $responseFormat['defaultErrorText']
    ];
}

echo json_encode($response);
