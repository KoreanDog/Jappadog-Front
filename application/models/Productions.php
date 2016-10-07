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
            'name'      => 'Terimayo',
            'href'      => 'Terimayo',
            'desc'      => 'The popular hotdog that was listed as "one of the must eat items in the world". The juicy kurobuta sausage elevates the flavours of the terimayo sauce.',
            'toppings'  => array('Pork Sausage', 'Teriyaki Sauce', 'Mayo', 'Seaweed', 'Bun')
        ),

        array(
            'name'      => 'Oroshi',
            'href'      => 'Oroshi',
            'desc'      =>  'Freshly grated radish with a special soya sauce. East meets West.',
            'toppings'  => array('Pork Sausage', 'Bun', 'Radish', 'Soya Sauce')
        ),

        array(
            'name'      => 'Spicy Cheese',
            'href'      => 'SpicyCheese',
            'desc'      => 'Another signature dog contains three types of cheese with a hint of spiciness in the sausage. All that topped with Terimayo sauce makes for a tasty hot dog.',
            'toppings'  => array('Pork Sausage', 'Bun', 'Cheese', 'Teriyaki Sauce', 'Mayo', 'Seaweed')
        ),

        array(
            'name'      => 'Salmon Dog',
            'href'      => 'SalmonDog',
            'desc'      => 'Topped with fresh onion and our special dressing.',
            'toppings'  => array('Pork Sausage', 'Bun', 'Onion', 'Special Dressing')
        ),

        array(
            'name'      => 'Tonkatsu',
            'href'      => 'Tonkatsu',
            'desc'      => 'Deep fried pork cutlet marinated in tonkatsu sauce topped with fresh cabbage.',
            'toppings'  => array('Pork Cutlet', 'Bun', 'Cabbage', 'Special Dressing')
        ),

        array(
            'name'      => 'Avocado',
            'href'      => 'Avocado',
            'desc'      => 'The Avocado dog is finally coming to the Robson store. Topped with Avocado, Cream cheese, Japanese mayo and Soy sauce.',
            'toppings'  => array('Pork Sausage', 'Bun', 'Avocado', 'Avocado', 'Cream Cheese', 'Soya Sauce')
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