<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 06/10/16
 * Time: 1:12 PM
 */
class Production extends Application
{
    public function __construct()
    {
        parent::__construct();
    }

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

        $role = $this->session->userdata('userrole');
        if ($role === 'admin') {
            $this->data['pagebody'] = 'production/index';
        } else {
            $this->data['pagebody'] = 'production/indexUser';
        }

        $this->data['recipes'] = $data;
        $this->data['pagetitle'] = 'Recipes';
        $this->render();

    }

    public function authorize() {
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $this->data['pagebody'] = 'notauthorized';
            $this->data['pagetitle'] = 'Access Denied';
            $message = 'You are not authorized to access this page.';
            $this->data['content'] = $message;

            $this->render();
            return false;
        }
        return true;
    }

    public function delete($id) {
        if ($id == null) {
            $this->index();
        }

        if ($this->authorize()) {
            $rec = $this->productions->get($id);

            $this->data['name'] = $rec->name;
            $this->data['id'] = $rec->id;
            $this->data['description'] = $rec->description;
            $this->data['pagebody'] = 'production/delete';
            $this->data['pagetitle'] = 'Delete Recipe';
            $this->render();
        }
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
        if ($this->authorize()) {
            $role = $this->session->userdata('userrole');
            if ($role != 'admin') {
                redirect('/');
            }

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
    }

    public function create() {
        if ($this->authorize()) {
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
    }

    public function createRecipe() {
        if ($this->authorize()) {
            redirect('/Production');
        }
        /**
         * $_POST and $this->input->post() are always empty and never pass any data back.
         */
    }

    public function saveRecipe() {
        $input = $this->input->post();
        $post = $this->input->post();
        var_dump($post);

        /**
         * $_POST and $this->input->post() are always empty and never pass any data back.
         */

        redirect('/Production');
    }

}
