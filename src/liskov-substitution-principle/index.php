<?php 
    class Shipping {
        protected $wheightGreaterThan = 0;
        public function calculateShippingCost($wheightOfPackageKg, $destiny) {
            // pre condition
            if($wheightOfPackageKg <= $this->wheightGreaterThan) {
                throw new \Exception("Package weight cannot be less than or equal to {$this->wheightGreaterThan}");
            }
            
            $shippingCost = rand(5, 15);
            
            if($shippingCost <= 0) {
                throw new \Exception("Shipping price cannot be less than or equal to zero");
            }

            return $shippingCost;
        }
    }
    
    // BREAKING LSP
    class WorldWideShippingExtends extends Shippging {
        public function calculateShippingCost($wheightOfPackageKg, $destiny) {
            // we modify the value of parent class
            $this->weightGreaterThan = 10;
            
            // pre condition 
            if($wheightOfPackageKg <= $this->wheightGreaterThan) {
                throw new \Exception("Package wheight cannot be less than or equal to {$this->weightGreaterThan}")
            }
        }
    }

    // NOT BREAKING LSP
    interface CalculabeShippingCost
    {
        public function calculateShippingCost($weightOfPackageKg, $destiny);
    }

    class WorldWideShipping implements CalculabeShippingCost
    {
        public function calculateShippingCost($weightOfPackageKg, $destiny)
        {
            // Implementation of logic
        }
    }