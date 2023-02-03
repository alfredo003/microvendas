<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class sale
 * @package Source\Models
 */
class Sale extends Model
{
    /**
     * sale constructor.
     */
    public function __construct()
    {
        parent::__construct("sales", ["id"], ["costumer", "product"]);
    }


      /**
     * @return null|Costumer  
     */
    public function costumer(): ?Costumer
    {
        if ($this->costumer) {
            return (new Costumer())->findById($this->costumer);
        }
        return null;
    }
    
      /**
     * @return null|Stock  
     */
    public function stock(): ?Stock
    {
        if ($this->product) {
            return (new Stock())->findById($this->product);
        }
        return null;
    }
}