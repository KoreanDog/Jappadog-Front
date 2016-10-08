<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 06/10/16
 * Time: 1:12 PM
 */
class Production extends Application
{
    public function index()
    {
        $recipes = $this->productions->all();

        $this->data['recipes'] = $recipes;
        $this->data['pagebody'] = 'production/index';
        $this->data['pagetitle'] = 'Recipes';
        $this->render();
    }

    public function recipe($name)
    {
        $recipe = $this->productions->get($name);
        $ingredients = array();

        foreach ($recipe['toppings'] as $topping)
        {
            $supplies = $this->supplies->get($topping);
            if ($supplies != null)
            {
                $stock = $supplies['instock'];
                if ($stock < 1)
                {
                    $stock = '<span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Out of Stock!';
                }
                $ingredient = array(
                    'name'  =>  $topping,
                    'stock' =>  $stock
                );
                array_push($ingredients, $ingredient);
            }
        }

        $this->data['ingredients'] = $ingredients;
        $this->data['name'] = $recipe['name'];
        $this->data['desc'] = $recipe['desc'];
        $this->data['pagebody'] = 'production/recipe';
        $this->data['pagetitle'] = $recipe['name'];
        $this->render();
    }
}