<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Journal;

use NicklasW\PkmGoApi\Api\Data\Data;

class Item extends Data {

    /**
     * @var integer
     */
    protected $itemId;

    /**
     * @var integer
     */
    protected $count;

    /**
     * @var boolean
     */
    protected $unseen;

    /**
     * Returns the item id.
     *
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Returns the count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Return true if unseen, false otherwise.
     *
     * @return boolean
     */
    public function isUnseen()
    {
        return $this->unseen;
    }
    

}