<?php
namespace System\Services;

use System\Services\FactoryInterface\ServicePrintInterface;

class ServicePrint implements ServiceInterface, ServicePrintInterface
{
    /**
     * @param $printData
     */
    public function prettyPrint($printData): void
    {
        print("<pre>".print_r($printData,true)."</pre>");
    }
}
