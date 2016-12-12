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
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin' && $userrole != 'user') {
            $this->data['pagebody'] = 'notauthorized';
            $this->data['pagetitle'] = 'Access Denied';
            $message = 'You are not authorized to access this page.';
            $this->data['content'] = $message;

            $this->render();
            return;
        }
        
        $recipes = $this->productions->allRecipes();
        $supplies = $this->getAllSupplies();
        $data = [];

        foreach ($recipes as $recipe) {
            $temp = [];
            $rec = $recipe['recipe'];
            $ings = $recipe['ingredients'];
            $temp['name'] = $rec->name;
            $temp['id'] = $rec->id;
            $temp['description'] = $rec->description;
            $temp['price'] = $rec->price;
            $items = array();
            foreach ($ings as $ing) {
                array_push($items, array('name' => $supplies[$ing->receivingid]->name));
            }
            $temp['ingredients'] = $items;
            array_push($data, $temp);
        }
        $this->data['recipes'] = $data;
        $this->data['pagebody'] = 'production/index';
        $this->data['pagetitle'] = 'Recipes';
        $this->render();

    }

    public function delete($id) {
        if ($id == null) {
            $this->index();
        }
        $rec = $this->productions->get($id);

        $this->data['name'] = $rec->name;
        $this->data['id'] = $rec->id;
        $this->data['description'] = $rec->description;
        $this->data['pagebody'] = 'production/delete';
        $this->data['pagetitle'] = 'Delete Recipe';
        $this->render();
    }

    public function deleteRecipe($id) {
        $this->productions->removeRecipe($id);
        redirect('/Production');
    }

    private function getAllSupplies() {
        $supplies = $supplies = $this->receivings->all();
        $result = [];
        foreach ($supplies as $supply) {
            $result[$supply->id] = $supply;
        }
        return $result;
    }

    public function editRecipe($id) {
        $rec = $this->productions->get($id);
        $allIng = $this->getAllSupplies();
        $ings = $this->Ingredients->some('recipeid', $id);

        $this->data['name'] = $rec->name;
        $this->data['id'] = $rec->id;
        $this->data['description'] = $rec->description;
        $this->data['price'] = $rec->price;

        $ingredients = [];
        foreach ($allIng as $ing) {
            $temp = array();
            $temp['id'] = $ing->id;
            $temp['name'] = $ing->name;
            $temp['instock'] = $ing->instock;
            $temp['checked'] = '';
            $ingredients[$ing->id] = $temp;
        }

        foreach ($ings as $ing) {
            $ingredients[$ing->receivingid]['checked'] = 'checked';
        }
        //var_dump($ingredients);
        $this->data['ingredients'] = $ingredients;
        $this->data['pagebody'] = 'production/edit';
        $this->data['pagetitle'] = 'Edit Recipe';
        $this->render();
    }

    public function create() {
        $allIng = $this->getAllSupplies();
        $ingredients = [];
        foreach ($allIng as $ing) {
            $temp = array();
            $temp['id'] = $ing->id;
            $temp['name'] = $ing->name;
            $temp['instock'] = $ing->instock;
            $temp['checked'] = '';
            $ingredients[$ing->id] = $temp;
        }
        $this->data['ingredients'] = $ingredients;
        $this->data['pagebody'] = 'production/create';
        $this->data['pagetitle'] = 'Create Recipe';
        $this->render();
    }

    public function createRecipe() {
        /**
         * $_POST and $this->input->post() are always empty and never pass any data back.
         */
        $this->index();
    }

    public function saveRecipe() {
        $input = $this->input->post();
        $post = $_POST;
        var_dump($post);

        /**
         * $_POST and $this->input->post() are always empty and never pass any data back.
         */

        $this->index();
    }

    public function recipe($name)
    {
        $recipe = $this->productions->get($name);
        $ingredients = array();

        foreach ($recipe['toppings'] as $topping)
        {
            $supplies = $this->receivings->get($topping);
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
