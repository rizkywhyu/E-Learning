<?php

/**
 * Format nomor hp dari 08xxx ke 62xx dsb
 * pastikan awalannya 08
 *
 * @param string $no_hp
 * @return string
 */
function format_no_hp($no_hp, $prefix='62')
{
    // nomor hapenya udah ke format jadi di return aj
    if (substr($no_hp, 0, 2) == '62') {
        return $no_hp;
    }
    return $prefix.substr($no_hp,1);
}