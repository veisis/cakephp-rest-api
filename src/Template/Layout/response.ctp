<?php

if (empty($response['result'])) {
    $response['result'] = [
        'message' => 'Empty response!'
    ];
}

echo json_encode($response);
