<?php
/**
 * Tracking API Helper Functions
 * Handles API calls to the new tracking endpoint
 */

/**
 * Call the tracking API
 * @param string $awbNo The AWB number to track
 * @return array|false Returns decoded JSON response or false on failure
 */
function callTrackingAPI($awbNo) {
    $apiUrl = 'https://xpresion.sbexpresscargo.com/api/v1/Tracking/Tracking';
    
    $data = array(
        'UserID' => 'CARD',
        'Password' => 'CARD',
        'AWBNo' => $awbNo
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    // Check for cURL errors
    if ($curlError) {
        error_log("Tracking API cURL Error: " . $curlError);
        return false;
    }
    
    // Check HTTP status code
    if ($httpCode !== 200) {
        error_log("Tracking API HTTP Error: " . $httpCode);
        return false;
    }
    
    // Decode JSON response
    $decoded = json_decode($response, true);
    
    // Check if response is valid and successful
    if ($decoded && isset($decoded['Response'])) {
        $responseCode = $decoded['Response']['ResponseCode'] ?? '';
        $errorCode = $decoded['Response']['ErrorCode'] ?? '';
        
        // Check if API call was successful (ErrorCode "0" means success)
        if ($errorCode === "0" || $errorCode === 0) {
            return $decoded;
        } else {
            error_log("Tracking API Error: " . ($decoded['Response']['ErrorDisc'] ?? 'Unknown error'));
            return false;
        }
    }
    
    return false;
}

/**
 * Check if API response has valid tracking data
 * @param array $apiResponse The API response array
 * @return bool
 */
function hasValidTrackingData($apiResponse) {
    if (!$apiResponse || !isset($apiResponse['Response'])) {
        return false;
    }
    
    $tracking = $apiResponse['Response']['Tracking'] ?? array();
    return !empty($tracking) && isset($tracking[0]);
}

?>
