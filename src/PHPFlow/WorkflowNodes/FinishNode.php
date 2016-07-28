<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 4:36 PM
 */

namespace PHPFlow\WorkflowNodes;

use PHPFlow\WorkflowNode;

class FinishNode extends WorkflowNode
{
    /**
     * FinishNode constructor.
     */
    public function __construct()
    {
        $this->setNodeName("Finish");
    }

    protected function execute()
    {
        // TODO: Implement execute() method.
    }
}