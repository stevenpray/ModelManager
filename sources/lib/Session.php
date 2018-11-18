<?php
/*
 * This file is part of the PommProject/ModelManager package.
 *
 * (c) 2014 - 2015 Grégoire HUBERT <hubert.greg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PommProject\ModelManager;

use PommProject\Foundation\Session as FoundationSession;
use PommProject\ModelManager\Event\CreateEvent;
use PommProject\ModelManager\Event\DeleteEvent;
use PommProject\ModelManager\Event\UpdateEvent;
use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\ModelLayer\ModelLayer;

/**
 * Session
 *
 * Model manager's session.
 * It adds proxy method to use model manager's poolers.
 *
 * @package   ModelManager
 * @copyright 2015 Grégoire HUBERT
 * @author    Grégoire HUBERT
 * @license   X11 {@link http://opensource.org/licenses/mit-license.php}
 *
 * @see FoundationSession
 */
class Session extends FoundationSession
{
    /**
     * getModel
     *
     * Return a model instance
     *
     * @access public
     * @param  string   $class
     * @return Model
     */
    public function getModel($class)
    {
        return $this->getClientUsingPooler('model', $class);
    }

    /**
     * getModelLayer
     *
     * Return a model layer instance
     *
     * @access public
     * @param  string   $class
     * @return ModelLayer
     */
    public function getModelLayer($class)
    {
        return $this->getClientUsingPooler('model_layer', $class);
    }

    /**
     * @param callable $listener
     * @return Session
     */
    public function setCreateListener($listener)
    {
        $this->emitter->addListener(CreateEvent::class, $listener);

        return $this;
    }

    /**
     * @param callable $listener
     * @return Session
     */
    public function setUpdateListener($listener)
    {
        $this->emitter->addListener(UpdateEvent::class, $listener);

        return $this;
    }

    /**
     * @param callable $listener
     * @return Session
     */
    public function setDeleteListener($listener)
    {
        $this->emitter->addListener(DeleteEvent::class, $listener);

        return $this;
    }
}
