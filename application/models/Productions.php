<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 06/10/16
 * Time: 1:20 PM
 */
class Productions extends CI_Model
{
    // Array of arrays of recipes
    var $recipes = array(
        array(
            'name'      => 'Avocado',
            'href'      => 'Avocado',
            'toppings'  => array('Avocado', 'Cream Cheese', 'Japanese Mayo', 'Soy Sauce', 'Tomato'),
            'meat'      => array('Beef'),
            'bun'       => array('Plain')
        ),

        array(
            'name'      => 'Shrimpy Chili',
            'href'      => 'ShrimpyChili',
            'toppings'  => array('Shrimp', 'Chili Sauce', 'Lettuce', 'Tomato'),
            'meat'      => array('Shrimp Sausage'),
            'bun'       => array('Whole Wheat')
        ),

        array(
            'name'      => 'Salmon Dog',
            'href'      =>  'SalmonDog',
            'toppings'  => array('Onion', 'Relish', 'House Dressing'),
            'meat'      => array('Salmon'),
            'bun'       => array('Whole Wheat')
        ),

        array(
            'name'      => 'Croquette',
            'href'      => 'Croquette',
            'toppings'  => array('Japanese Croquettes', 'Mashed Potato'),
            'meat'      => array('Arabiki Sausage'),
            'bun'       => array('Plain')
        ),

        array(
            'name'      => 'Three Cheese Smokey',
            'href'      => 'ThreeCheeseSmokey',
            'toppings'  => array('Cheddar', 'Mozzarella', 'Cream Cheese'),
            'meat'      => array('Beef'),
            'bun'       => array('Whole Wheat')
        ),

        array(
            'name'      => 'Tonkatsu',
            'href'      => 'Tonkatsu',
            'toppings'  => array('Cabbage', 'House Dressing', 'Onion'),
            'meat'      => array('Pork'),
            'bun'       => array('Plain')
        ),

        array(
            'name'      => 'Kobe Beef',
            'href'      => 'KobeBeef',
            'toppings'  => array('Ketchup', 'Bean Curd', 'Lettuce', 'Kobe Dressing'),
            'meat'      => array('Kobe Beef'),
            'bun'       => array('Brioche')
        ),

        array(
            'name'      => 'Ebi Tempura',
            'href'      => 'EbiTempura',
            'toppings'  => array('Shrimp', 'Seaweed', 'Relish', 'Lettuce'),
            'meat'      => array('Shrimp Sausage'),
            'bun'       => array('Plain')
        )
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->recipes;
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->recipes))
        {
            return $this->recipes[$name];
        }
        else
        {
            return null;
        }
    }
}