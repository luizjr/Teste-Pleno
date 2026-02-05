<?php

if (! function_exists('gravatar')) {
    function gravatar($email, $size = 80) {
        $hash = md5(strtolower(trim($email)));
        return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=mp";
    }
}
