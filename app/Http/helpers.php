<?php

    function setNumberFormat($valor){
        return number_format(round(floatval($valor),2),2,'.',',');
    }

    function setFormatHumans($value){
        return Carbon\Carbon::createFromDate($value)->diffForHumans();
    }

    function setFormatDate($value){
        return Carbon\Carbon::createFromDate($value);
    }

    function setFormatSize($value){
        return round(($value / (1048576.2)),2);
    }

    function setActiveRoute($name){
        return request()->routeIs($name)? 'active':'';
    }

    function setReplaceNumber($money){
        return str_replace(',', '.', $money);
    }

    function setReplaceSum($money){
        return str_replace(',', '', $money);
    }
