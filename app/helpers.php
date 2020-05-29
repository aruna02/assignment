<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('history')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function history()
    {
        return new App\Modules\History\Repositories\HistoryRepository;
    }
}

if (! function_exists('priceFormat')) {
    /**
     * Helper to get price format
     *
     * @return mixed
     */
    function priceFormat($price)
    {
        return number_format($price, 2, '.', ',').'/-';
    }
}