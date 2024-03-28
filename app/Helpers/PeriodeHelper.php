<?php

if (!function_exists('isBulanGanjil')) {
    /**
     * Memeriksa apakah bulan termasuk dalam periode ganjil.
     *
     * @param int $bulan
     * @return bool
     */
    function isBulanGanjil($bulan)
    {
        return in_array($bulan, [9, 10, 11, 12, 1, 2]);
    }
}

if (!function_exists('isBulanGenap')) {
    /**
     * Memeriksa apakah bulan termasuk dalam periode genap.
     *
     * @param int $bulan
     * @return bool
     */
    function isBulanGenap($bulan)
    {
        return !isBulanGanjil($bulan);
    }
}
