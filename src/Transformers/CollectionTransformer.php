<?php
namespace App\Transformers;

use App\Entities\TransformableEntity;
use Doctrine\Common\Collections\Collection;

class CollectionTransformer
{
    /**
     * @param Collection|array $collection
     *
     * @return array
     */
    public function transform($collection)
    {
        $result = [];

        foreach ($collection as $item) {
            if ($item instanceof TransformableEntity) {
                $result[] = $item->transform();
            } elseif (is_array($item)) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
