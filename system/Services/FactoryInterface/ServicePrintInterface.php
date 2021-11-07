<?php

namespace System\Services\FactoryInterface;

interface ServicePrintInterface
{
    /**
     * @param $printData
     */
    public function prettyPrint($printData): void;
}
