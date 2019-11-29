<?php
/**
 * B2W Digital - Companhia Digital
 *
 * Do not edit this file if you want to update this SDK for future new versions.
 * For support please contact the e-mail bellow:
 *
 * sdk@e-smart.com.br
 *
 * @category  SkuHub
 * @package   SkuHub
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br).
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 */

namespace SkyHub\Api\DataTransformer\Sales\Order;

use SkyHub\Api\DataTransformer\DataTransformerAbstract;

class Invoice extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $invoiceKey
     * @param string $status
     */
    public function __construct($invoiceKey, $status = null)
    {
        $param = [
            'invoice' => [
                'key' => $invoiceKey
            ]
        ];

        if ($status) {
            $param['status'] = $status;
        }

        $this->setOutputData($param);

        parent::__construct();
    }
}
