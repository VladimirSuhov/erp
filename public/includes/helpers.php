<?php
function formatChars($data) {
    return nl2br( htmlspecialchars( trim($data), ENT_QUOTES ), false );
}