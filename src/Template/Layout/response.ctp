<?php

if (empty($response[$responseFormat['resultKey']])) {
    $response[$responseFormat['resultKey']] = [
        $responseFormat['messageKey'] => $responseFormat['defaultMessageText']
    ];
}

echo json_encode($response);
