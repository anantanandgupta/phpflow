<?php
/**
 * Created by PhpStorm.
 * User: anantanandgupta
 * Date: 28/07/16
 * Time: 1:22 PM
 */

namespace PHPFlow;

class Workflow
{
    private $_nodes = [];
    private $_context = [];

    /**
     * Workflow constructor.
     *
     * @param array $_message
     */
    public function __construct(array $_message)
    {
        $this->_context["message"] = $_message;
        $this->_context["result"] = [];
    }

    public function createVariable($name)
    {
        if (!isset($this->_context[$name]))
        {
            $this->_context[$name] = [];
        }
    }

    public function addNode(WorkflowNode $node)
    {
        $node->setContext($this->_context);
        $this->_nodes[$node->getNodeName()] = $node;
    }

    public function validate()
    {
        if (!array_key_exists("Start", $this->_nodes)) return false;
        if (!array_key_exists("Finish", $this->_nodes)) return false;
        if (!empty($this->_nodes["Finish"]->getNextNode())) return false;
        if (empty($this->_nodes["Start"]->getNextNode())) return false;

        return true;
    }

    public function execute()
    {
        if (!$this->validate())
        {
            user_error("invalid workflow");
        }

        $nodeName = "Start";
        do
        {
            $nodeName = $this->_nodes[$nodeName]->run();
        } while ($nodeName !== "Finish");

        return $this->_context["result"];
    }
}