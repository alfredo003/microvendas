<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class box
 * @package Source\Models
 */
class Box extends Model
{
    /**
     * box constructor.
     */
    public function __construct()
    {
        parent::__construct("box_sales", ["id"], ["total", "lucro"]);
    }

}