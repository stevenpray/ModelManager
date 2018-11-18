<?php

namespace PommProject\ModelManager\Event;

use League\Event\Event as BaseEvent;
use PommProject\ModelManager\Model\FlexibleEntity\FlexibleEntityInterface;
use PommProject\ModelManager\Model\Model;

/**
 * Class Event
 */
class Event extends BaseEvent
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var FlexibleEntityInterface
     */
    protected $entity;

    /**
     * Event constructor.
     *
     * @param $model
     * @param FlexibleEntityInterface $entity
     */
    public function __construct($model, FlexibleEntityInterface $entity)
    {
        parent::__construct(get_class($this));

        $this->model = $model;
        $this->entity = $entity;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return FlexibleEntityInterface
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
