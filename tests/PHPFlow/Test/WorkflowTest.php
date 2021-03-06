<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 2:51 PM
 */

namespace PHPFlow\Test;

use PHPFlow\Workflow;
use PHPFlow\WorkflowNodes\AssignNode;
use PHPFlow\WorkflowNodes\FinishNode;
use PHPFlow\WorkflowNodes\StartNode;
use PHPUnit\Framework\TestCase;

class WorkflowTest
    extends TestCase
{
    public function testWorkflow()
    {
        // input message for the workflow
        $message = [];
        $message["price"] = 123;
        $message["qty"] = 2;

        // create workflow
        $workflow = new Workflow($message);

        // create variable
        $workflow->createVariable("total");

        // add start node
        $workflow->addNode(new StartNode("build"));

        // add finish node
        $workflow->addNode(new FinishNode());

        // add assign node
        $workflow->addNode(new AssignNode(null, null, "build", "Finish"));

        // execute and get result
        $result = $workflow->execute();
        $this->assertEquals('hello', $result);
        echo json_encode($result);
    }
}
