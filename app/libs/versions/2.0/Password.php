<?php

class Password {

    public static function hash($input, $rounds = 7) {
        $salt = "";
        $salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++) {
            $salt .= $salt_chars[array_rand($salt_chars)];
        }
        return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }

    public static function makeCookieHash($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function unique() {
        return self::makeCookieHash(uniqid());
    }

    public static function check($input, $stored_password) {
        return crypt($input, $stored_password) === $stored_password;
    }

    public static function verify($stored_password) {
        $input = Password::hash($stored_password);
        if ($input != $stored_password) {
            return $input;
        }
        return true;
    }

}
