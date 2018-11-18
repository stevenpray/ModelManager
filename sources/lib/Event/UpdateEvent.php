<?php

namespace PommProject\ModelManager\Event;

use PommProject\ModelManager\Model\FlexibleEntity\FlexibleEntityInterface;

/**
 * Class UpdateEvent
 */
class UpdateEvent extends Event
{
    /**
     * @var array
     */
    protected $updates;

    /**
     * CreateEvent constructor.
     *
     * @param $model
     * @param FlexibleEntityInterface $entity
     * @param array $updates
     */
    public function __construct($model, FlexibleEntityInterface $entity, $updates)
    {
        parent::__construct($model, $entity);

        $this->updates = $updates;
    }

    /**
     * @return array
     */
    public function getUpdates()
    {
        return $this->updates;
    }
}
