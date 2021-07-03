<?php


if(! function_exists("formatDate")) {
    function formatDate($date) {
        if(! $date instanceof \Carbon\Carbon)
            $date = \Carbon\Carbon::createFromDate($date);
        return $date->format("d/m/Y");



    }
}

