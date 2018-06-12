<?php
namespace App\Entities;

interface TransformableEntity
{
    /**
     * @return array
     */
    public function transform();
}