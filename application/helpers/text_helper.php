<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('word_limiter')) {
    /**
     * Word Limiter
     *
     * Memotong teks menjadi sejumlah kata tertentu.
     *
     * @param string $str Teks yang akan dipotong.
     * @param int $limit Jumlah kata yang ingin dipertahankan.
     * @param string $end_char Karakter yang akan ditambahkan di akhir teks (default: '...').
     * @return string Teks yang sudah dipotong.
     */
    function word_limiter($str, $limit = 100, $end_char = '&#8230;')
    {
        if (trim($str) === '') {
            return $str;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

        if (strlen($str) === strlen($matches[0])) {
            $end_char = '';
        }

        return rtrim($matches[0]) . $end_char;
    }
}
