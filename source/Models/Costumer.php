<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Costumer
 * @package Source\Models
 */
class Costumer extends Model
{
    /**
     * Costumer constructor.
     */
    public function __construct()
    {
        parent::__construct("costumers", ["id"], ["name", "status"]);
    }

}