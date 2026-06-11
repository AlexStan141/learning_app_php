<?php

//Function used to prevent XSS attacks
function e(string $text) : string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}