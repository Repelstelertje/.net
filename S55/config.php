<?php
$base = __DIR__;
// Configuration for API endpoints

// Base API URL used for most countries. Can be overridden via environment variable
$API_BASE_DEFAULT = getenv('API_BASE_URL_DEFAULT') ?: 'https://16hl07csd16.nl';

// Base API URL for Belgium. Can also be overridden
$API_BASE_BE = getenv('API_BASE_URL_BE') ?: 'https://20fhbe2020.be';

// Base API URL for the United Kingdom
$API_BASE_UK = getenv('API_BASE_URL_UK') ?: 'https://22mlf09mds22.com';

// Base API URL for Germany
$API_BASE_DE = getenv('API_BASE_URL_DE') ?: 'https://23mlf01ccde23.com';

/**
 * Returns the API base URL for a given country code.
 * If no specific base is defined for the country, the default is returned.
 *
 * @param string $country two-letter country code
 * @return string
 */
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
