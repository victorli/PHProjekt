<?php
/**
 * Unit test
 *
 * LICENSE: Licensed under the terms of the PHProjekt 6 License
 *
 * @copyright  Copyright (c) 2007 Mayflower GmbH (http://www.mayflower.de)
 * @license    http://phprojekt.com/license PHProjekt 6 License
 * @version    CVS: $Id$
 * @link       http://www.phprojekt.com
 * @since      File available since Release 1.0
*/
require_once 'PHPUnit/Framework.php';

/**
 * Tests for Database Nodes
 *
 * @copyright  Copyright (c) 2007 Mayflower GmbH (http://www.mayflower.de)
 * @license    http://phprojekt.com/license PHProjekt 6 License
 * @version    Release: @package_version@
 * @link       http://www.phprojekt.com
 * @since      File available since Release 1.0
 * @author     David Soria Parra <soria_parra@mayflower.de>
 */
class Phprojekt_Tree_Node_DatabaseTest extends PHPUnit_Framework_TestCase
{
    private $_tree;
    private $_model;

    /**
     * initialite
     */
    public function setUp()
    {
        $this->_model = new Project_Models_Project($this->sharedFixture);
        $this->_tree = new Phprojekt_Tree_Node_Database($this->_model, 1);
        $this->_tree->setup();
    }

    /**
     * setup
     */
    public function testSetup()
    {
        $this->assertEquals('/', $this->_tree->path);
        $this->assertEquals('Invisible Root', $this->_tree->title);
        $this->assertNotNull($this->_tree->id);
        $this->assertEquals(1, count($this->_tree->getChildren()));
        $this->assertNotNull($this->_tree->isSetup());
    }

    /**
     * iterator
     */
    public function testIterator()
    {
        $iterator = $this->_tree->getIterator();
        $this->assertTrue($iterator instanceof RecursiveIteratorIterator);
    }

    /**
     * depth
     */
    public function testGetDepth()
    {
        $this->assertEquals(0, $this->_tree->getDepth());
        $node = $this->_tree->getNodeById(2);
        $this->assertEquals(1, $node->getDepth());
        $node = $this->_tree->getNodeById(5);
        $this->assertEquals(2, $node->getDepth());
    }

    /**
     * childrens
     */
    public function testGetFirstChild()
    {
        $child = $this->_tree->getFirstChild();
        $this->assertEquals('Project 1', $child->title);

        $node = $this->_tree->getNodeById(2);
        $child = $node->getFirstChild();
        $this->assertEquals('Sub Project', $child->title);

        $node = $this->_tree->getNodeById(4);
        $child = $node->getFirstChild();
        $this->assertEquals('Sub Sub Project 1', $child->title);

        $node = $this->_tree->getNodeById(7);
        $child = $node->getFirstChild();
        $this->assertNull($child);
    }

    /**
     * move tree
     */
    public function testMove()
    {
        $child1 = $this->_tree->getNodeById(4);
        $child2 = $this->_tree->getNodeById(5);
        $child1->setParentNode($child2);

        $tree = new Phprojekt_Tree_Node_Database($this->_model, 1);
        $tree->setup();
        $this->assertEquals(5, $tree->getNodeById(4)->parentNode->id);
    }

    /**
     * append
     */
    public function testAppend()
    {
        $new = new Phprojekt_Tree_Node_Database($this->_model);
        $new->title = 'Hello World';

        $this->_tree->getNodeById(5)->appendNode($new);
        $this->assertEquals('/1/2/5/', $new->path);
        $this->assertEquals(5, $new->projectId);
    }

    /**
     * rootNode
     */
    public function testRootNode()
    {
        $this->assertEquals($this->_tree->id, $this->_tree->getRootNode()->id);
    }

    /**
     * subtree test
     */
    public function testGetSubtree()
    {
        $tree = new Phprojekt_Tree_Node_Database($this->_model, 4);
        $tree->setup();

        $this->assertEquals(2, count($tree->getChildren()));
        $this->assertNull($tree->getNodeById(2));
        $this->assertEquals('Sub Project', $tree->title);

        $this->assertTrue($tree->isRootNodeForCurrentTree());
        $this->assertFalse($tree->isRootNode());
    }

    /**
     * delete test node
     */
    public function testDeleteNode()
    {
        $tree = new Phprojekt_Tree_Node_Database($this->_model, 5);
        $tree->setup();
        $this->assertEquals(1, count($tree->getChildren()));
        $tree->delete();
        $this->assertNull($tree->id);
        $this->assertEquals(0, count($tree->getChildren()));

        $this->setExpectedException('Phprojekt_Tree_Node_Exception');
        $tree->delete();
    }

    /**
     * delete test root node
     */
    public function testDeleteRoot()
    {
        $this->setExpectedException('Phprojekt_Tree_Node_Exception');
        $this->_tree->delete();
    }
}