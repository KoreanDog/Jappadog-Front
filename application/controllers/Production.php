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

    public function ingredients($name)
    {
        $recipe = $this->productions->get($name);

    }
}