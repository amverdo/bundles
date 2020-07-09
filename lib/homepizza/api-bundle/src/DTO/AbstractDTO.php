<?php

namespace Homepizza\ApiBundle\DTO;

use Homepizza\ApiBundle\DTO\Responses\AddressResponse;

abstract class AbstractDTO
{
    public function toArray()
    {
        $arrayObject = [];
        foreach ($this as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $index => $adddressObject) {
                    if ($adddressObject instanceof AddressResponse) {
                        $arrayAddressObject = [];
                        foreach ($adddressObject as $keyName => $valueAddress) {
                            $arrayAddressObject[$keyName] = $valueAddress;
                        }
                        $value[$index] = $arrayAddressObject;
                    }
                    else {
                        break;
                    }
                }
            }
            $arrayObject[$key] = $value;
        }
        return $arrayObject;
    }
}
