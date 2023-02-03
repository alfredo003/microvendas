<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class stock
 * @package Source\Models
 */
class Stock extends Model
{
    /**
     * stock constructor.
     */
    public function __construct()
    {
        parent::__construct("stocks", ["id"], ["product", "price"]);
    }

}