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
        $supplies = $this->supplies->all();
        $recipe = $this->productions->get($name);
        $ingredients = array();

        foreach ($recipe['toppings'] as $topping)
        {
            foreach ($supplies as $supply)
            {
                if ($topping === $supply['name']);
                {
                    $ingredient = array(
                        'name'  =>  $topping,
                        'stock' =>  $supply['instock']
                    );
                    array_push($ingredients, $ingredient);
                    break;
                }
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