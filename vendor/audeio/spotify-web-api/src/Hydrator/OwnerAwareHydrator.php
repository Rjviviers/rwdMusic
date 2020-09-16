<?php
namespace Audeio\Spotify\Hydrator;

use Audeio\Spotify\Entity\User;
use Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class OwnerAwareHydrator
 * @package Audeio\Spotify\Hydrator
 */
class OwnerAwareHydrator extends ClassMethods
{

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        if (!isset($data['owner'])) {
            return $object;
        }

        $hydrators = new AggregateHydrator();
        $hydrators->add(new UserHydrator());
        $hydrators->add(new ImageCollectionAwareHydrator());

        $object->setOwner($hydrators->hydrate($data['owner'], new User()));

        return $object;
    }
}