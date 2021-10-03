<?php
namespace System\Services;

class ServicePrint implements ServiceInterface
{
    /**
     * @param $printData
     */
    public function prettyPrint($printData): void
    {
        print("<pre>".print_r($printData,true)."</pre>");
    }
}
