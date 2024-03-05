<?php

trait DatetimeTrait
{
    private \DateTime $createdAt;

    public function getCreatedAt(): \DateTime
    {
        if (!$this->createdAt) {
            $this->createdAt = new \DateTime();
        }
        
        return $this->createdAt;
    }
}
