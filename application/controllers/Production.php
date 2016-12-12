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
        $this->load->helper('formfields', 'form');
        $this->error_messages = array();
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

            $this->data['id'] = form_hidden('recipeid', $rec->id);
            $this->data['name'] = makeTextField('Name', 'name', $rec->name);
            $this->data['price'] = makeTextField('Price', 'price', $rec->price);
            $this->data['description'] = maketextArea('Description', 'description', $rec->description);

            $ingredients = [];
            foreach ($allIng as $ing) {
                $temp = array();
                $temp['id'] = $ing->id;
                $temp['name'] = $ing->name;
                $temp['instock'] = $ing->instock;
                $temp['checked'] = false;
                $ingredients[$ing->id] = $temp;
            }
            foreach ($ings as $ing) {
                $ingredients[$ing->receivingid]['checked'] = true;
            }
            $checkboxes = [];
            foreach ($ingredients as $ingredient) {
                array_push($checkboxes, array(
                    'checkbox' => form_checkbox('ingredients[]', $ingredient['id'], $ingredient['checked']),
                    'name' => $ingredient['name']
                    )
                );
            }

            $this->data['ingredients'] = $checkboxes;
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
                $temp['checked'] = false;
                $ingredients[$ing->id] = $temp;
            }
            $checkboxes = [];
            foreach ($ingredients as $ingredient) {
                array_push($checkboxes, array(
                        'checkbox' => form_checkbox('ingredients[]', $ingredient['id'], $ingredient['checked']),
                        'name' => $ingredient['name']
                    )
                );
            }

            $this->data['ingredients'] = $checkboxes;

            $this->data['name'] = makeTextField('Name', 'name', null);
            $this->data['price'] = makeTextField('Price', 'price', null);
            $this->data['description'] = maketextArea('Description', 'description', null);
            $this->data['ingredients'] = $checkboxes;
            $this->data['pagebody'] = 'production/create';
            $this->data['pagetitle'] = 'Create Recipe';
            $this->render();
        }
    }

    public function createRecipe() {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, nothing is in progress
        if (empty($record)) {
            $this->index();
            return;
        }

        $incoming = $this->input->post();
        foreach(get_object_vars($record) as $index => $value)
            if (isset($incoming[$index]))
                $record->$index = $incoming[$index];
        $this->session->set_userdata('record',$record);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->productions->rules());
        if ($this->form_validation->run() != TRUE)
            $this->error_messages = $this->form_validation->error_array();

        $data = [
            'name' => $incoming['name'],
            'description' => $incoming['description'],
            'price' => $incoming['price'],
            'ingredients' => $incoming['ingredients']
        ];
        $this->productions->createRecipe($data);
        redirect('/Production');
    }

    public function saveRecipe() {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, nothing is in progress
        if (empty($record)) {
            $this->index();
            return;
        }

        $incoming = $this->input->post();
        foreach(get_object_vars($record) as $index => $value)
            if (isset($incoming[$index]))
                $record->$index = $incoming[$index];
        $this->session->set_userdata('record',$record);

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->productions->rules());
        if ($this->form_validation->run() != TRUE)
            $this->error_messages = $this->form_validation->error_array();

        $data = [
            'name' => $incoming['name'],
            'description' => $incoming['description'],
            'price' => $incoming['price']
        ];
        $this->productions->updateRecipe($incoming['recipeid'], $data);
        $this->Ingredients->updateRecipe($incoming['recipeid'], $incoming['ingredients']);
        redirect('/Production');
    }

}
