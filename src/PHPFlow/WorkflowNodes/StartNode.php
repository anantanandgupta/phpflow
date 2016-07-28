<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 4:33 PM
 */

namespace PHPFlow\WorkflowNodes;

use PHPFlow\WorkflowNode;

class StartNode extends WorkflowNode
{
    /**
     * StartNode constructor.
     *
     * @param $nextNode
     */
    public function __construct($nextNode)
    {
        $this->setNodeName("Start");
        $this->nextNode = $nextNode;
    }

    protected function execute()
    {
        // TODO: Implement execute() method.
    }
}