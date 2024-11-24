<?php

use CodeIgniter\CodeIgniter;

/**
 * Returns CodeIgniter's version.
 */
function ci_version(): string
{
    return CodeIgniter::CI_VERSION;
}

function generateIdTransaksi($kodeJenis, $urutan)
{
    $urutanPadded = str_pad($urutan, 2, '0', STR_PAD_LEFT);
    return $kodeJenis . $urutanPadded;
}
