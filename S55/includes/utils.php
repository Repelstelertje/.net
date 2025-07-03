<?php
function strip_bad_chars($input) {
    return preg_replace('/[^a-zA-Z0-9_-]/', '', $input);
}

function slugify($text) {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}
?>
