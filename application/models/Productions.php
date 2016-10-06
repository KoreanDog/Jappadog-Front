<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 06/10/16
 * Time: 1:20 PM
 */
class Productions extends CI_Model
{
    // 2D array of name : ingredients composing the recipe
    var $recipes = array(
        'Avocado'       =>  array(
            'name'      => 'Avocado',
            'toppings'  => array('Avocado', 'Cream Cheese', 'Japanese Mayo', 'Soy Sauce', 'Tomato'),
            'meat'      => array('Beef'),
            'bun'       => array('Plain')
        ),

        'Shrimpy Chili' => array(
            'name'      => 'Shrimpy Chilli',
            'toppings'  => array('Shrimp', 'Chilli Sauce', 'Lettuce', 'Tomato'),
            'meat'      => array('Shrimp Sausage'),
            'bun'       => array('Whole Wheat')
        ),

        'Salmon Dog'    => array(
            'name'      => 'Salmon Dog',
            'toppings'  => array('Onion', 'Relish', 'House Dressing'),
            'meat'      => array('Salmon'),
            'bun'       => array('Whole Wheat')
        ),

        'Croquette'     => array(
            'name'      => 'Croquette',
            'toppings'  => array('Japanese Croquettes', 'Mashed Potato'),
            'meat'      => array('Arabiki Sausage'),
            'bun'       => array('Plain')
        ),

        'Three Cheese Smokey' => array(
            'name'      => 'Three Cheese Smokey',
            'toppings'  => array('Cheddar', 'Mozzarella', 'Cream Cheese'),
            'meat'      => array('Beef'),
            'bun'       => array('Whole Wheat')
        ),

        'Tonkatsu' => array(
            'name'      => 'Tonkatsu',
            'toppings'  => array('Cabbage', 'House Dressing', 'Onion'),
            'meat'      => array('Pork'),
            'bun'       => array('Plain')
        ),

        'Kobe Beef' => array(
            'name'      => 'Kobe Beef',
            'toppings'  => array('Ketchup', 'Bean Curd', 'Lettuce', 'Kobe Dressing'),
            'meat'      => array('Kobe Beef'),
            'bun'       => array('Brioche')
        ),

        'Ebi Tempura' => array(
            'name'      => 'Ebi Tempura',
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