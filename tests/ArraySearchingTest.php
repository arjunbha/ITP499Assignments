<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 3/25/14
 * Time: 6:05 PM
 */

include "../classes/BookSearch.php";
include "../classes/Input.php";

class ArraySearchingTest extends PHPUnit_Framework_TestCase {

    public $books = array(
        "Introduction to HTML and CSS" => 432,
        "Learning JavaScript Design Patterns" => 32,
        "Object Oriented JavaScript" => 42,
        "JavaScript Web Applications" => 99,
        "PHP Object Oriented Solutions" => 80,
        "PHP Design Patterns" => 300,
        "Head First Java" => 200
    );

    public function testOne() {
        $search = new BookSearch($this->books);
        $results = $search->find('javascript', FALSE);
        $this->assertEquals('99', array_pop($results));
        $this->assertEquals('42', array_pop($results));
        $this->assertEquals('32', array_pop($results));
    }

    public function testtwo() {
        $search = new BookSearch($this->books);

        // returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
        $results = $search->find('javascript web applications', true);
        $this->assertEquals('99', array_pop($results));

    }

    public function testThree() {
        $search = new BookSearch($this->books);

        // returns false
        $results = $search->find('The Definitive Guide to Symfony', true);
        $this->assertFalse($results);
    }

    public function testGetOne() {
        $one = $_GET['email'] = 'dtang@usc.edu';
        $two = Input::get('email'); // 'dtang@usc.edu'

        $this->assertEquals($one, $two);
    }

    public function testGetTwo() {

        // notice how i am not setting anything in $_GET here
        $one = Input::get('email'); // null, see assertNull()
        $two = Input::get('plan', 'standard'); // assertEquals 'standard', since it did not exist in $_GET. You are basically providing a default value here

        $this->assertNull($one);
        $this->assertEquals($two, 'standard');
    }

    public function tearDown()
    {
        unset($_GET['email']);
    }



}