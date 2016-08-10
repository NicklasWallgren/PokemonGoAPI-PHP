<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Requests\GetInventoryRequest;
use NicklasW\PkmGoApi\Requests\RecycleInventoryItemRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\GetInventoryResponse;

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

    /**
     * Recycle item.
     *
     * @param integer $itemId
     * @param int  $count
     * @return RecycleInventoryItemResponse
     */
    public function recycle($itemId, $count)
    {
        $recycleInventoryItemRequest = new RecycleInventoryItemRequest($itemId, $count);

        $this->requestHandler()->handle($recycleInventoryItemRequest);

        return $recycleInventoryItemRequest->getData();
    }
}