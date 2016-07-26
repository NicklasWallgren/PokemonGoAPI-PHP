<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Requests\GetInventoryRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class InventoryRequestService extends RequestService {

    /**
     * Returns the inventory.
     *
     * @return GetInventoryResponse
     */
    public function getInventory()
    {
        $inventoryRequest = new GetInventoryRequest();

        $this->requestHandler()->handle($inventoryRequest);

        return $inventoryRequest->getData();
    }

}