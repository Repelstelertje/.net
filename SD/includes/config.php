<?php
$BASE_URL = getenv('BASE_URL') ?: 'https://shemaledaten.net';
$API_BASE_DEFAULT = getenv('API_BASE_URL_DEFAULT') ?: 'https://16hl07csd16.nl';
$API_BASE_BE = getenv('API_BASE_URL_BE') ?: 'https://20fhbe2020.be';
$API_BASE_UK = getenv('API_BASE_URL_UK') ?: 'https://22mlf09mds22.com';
$API_BASE_DE = getenv('API_BASE_URL_DE') ?: 'https://23mlf01ccde23.com';

function api_base($country = '') {
    global $API_BASE_DEFAULT, $API_BASE_BE, $API_BASE_UK, $API_BASE_DE;
    switch (strtolower($country)) {
        case 'be':
            return $API_BASE_BE;
        case 'uk':
            return $API_BASE_UK;
        case 'de':
        case 'at':
        case 'ch':
            return $API_BASE_DE;
        default:
            return $API_BASE_DEFAULT;
    }
}
?>
