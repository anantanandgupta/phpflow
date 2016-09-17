<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 1:33 PM
 */

namespace PHPFlow;

abstract class WorkflowNode
{
    protected $context;
    protected $nodeName = "";
    protected $nextNode = "";
    protected $action;

    /**
     * @return string
     */
    public function getNodeName()
    {
        return $this->nodeName;
    }

    /**
     * @param string $nodeName
     */
    protected function setNodeName($nodeName)
    {
        $this->nodeName = $nodeName;
    }

    /**
     * @return string
     */
    public function getNextNode() {
        return $this->nextNode;
    }

    /**
     * @param string $nextNode
     */
    protected function setNextNode($nextNode)
    {
        $this->nextNode = $nextNode;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        if(is_callable($action))
        {
            $this->action = $action;
        } else {
            user_error("$action must be a function");
        }
    }

    public function setContext(Context &$context)
    {
        $this->context = &$context;
    }

    public function run() {
        $this->execute();
        return $this->getNextNode();
    }
    abstract protected function execute();
}