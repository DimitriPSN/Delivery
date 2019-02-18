<?php
namespace Ws\Delivery\Common\Hydrator;

use Ws\Delivery\Common\Entity\Position;

/**
 * Class PositionHydrator
 *
 * @author PISANI Dimitri
 *
 * @package Ws\Delivery\Common\Hydrator
 */
class PositionHydrator
{
    /**
     * @param Position $position
     * @return array
     */
    public function extract(Position $position): array
    {
        return [
            'id' => $position->getId(),
            'parcelNumber' => $position->getParcelNumber(),
            "latitude" => $position->getLatitude(),
            "longitude" => $position->getLongitude(),
            "date" => $position->getDate()
        ];
    }

    /**
     * @param Position $object
     * @param array $values
     * @return Position
     */
    public function hydrate(Position $object, array $values = []): Position
    {
        foreach ($values as $name => $value) {
            $setterName = "set" . ucfirst($name);
            if(method_exists($object, $setterName))
            {
                if($setterName == "setDate"){
                    $object->$setterName(new \DateTime($value));
                }
                else
                {
                    $object->$setterName($value);
                }
            }
        }
        return $object;
    }
}