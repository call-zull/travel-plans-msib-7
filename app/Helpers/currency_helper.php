<?php

/**
 * Fungsi untuk menghitung increment dari penomoran pagination
 */

function formatMataUang($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
