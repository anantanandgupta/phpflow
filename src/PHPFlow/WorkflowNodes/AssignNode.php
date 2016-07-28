<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 1:35 PM
 */

namespace PHPFlow\WorkflowNodes;

use PHPFlow\WorkflowNode;

class AssignNode extends WorkflowNode
{
    public $assignTo;
    public $assignFrom;

    /**
     * AssignNode constructor.
     *
     * @param       $assignTo
     * @param       $assignFrom
     * @param       $nodeName
     * @param       $nextNode
     */
    public function __construct($assignTo, $assignFrom, $nodeName, $nextNode)
    {
        $this->assignTo = $assignTo;
        $this->assignFrom = $assignFrom;
        $this->nodeName = $nodeName;
        $this->nextNode = $nextNode;
    }

    protected function execute()
    {
        $this->context["result"] = "hello";
//        if(isset($this->action)) {
//            ($this->action)();
//        }

//        if (is_callable($this->assignFrom))
//        {
//            $this->assignTo = ($this->assignFrom)();
//        } else
//        {
//            $this->assignTo = $this->assignFrom;
//        }
    }
}