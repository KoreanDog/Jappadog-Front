<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 06/10/16
 * Time: 1:20 PM
 */
class Productions extends MY_Model
{

    function rules() {
        $config = [
            ['field'=>'name', 'label'=>'Recipe Name', 'rules'=> 'required'],
            ['field'=>'description', 'label'=>'Description', 'rules'=> 'required'],
            ['field'=>'price', 'label'=>'Link Reference', 'rules'=> 'required|decimal']
        ];
        return $config;
    }

    public function __construct()
    {
        parent::__construct();
        $this->_tableName = 'menu';
    }

    // Get all recipes and the menu ingredients from the ingredients table
    public function allRecipes() {
        $all = parent::all();
        $result = [];
        for ($i = 0; $i < sizeof($all); $i ++) {
            $id = $all[$i]->id;

            $this->db->select('*')->from('ingredients')->where('recipeid = ' . $all[$i]->id);
            $query = $this->db->get()->result();

            $result[$id] = array('recipe' => $all[$i], 'ingredients' => $query);
        }
        return $result;
    }

    public function removeRecipe($id) {
        $result = parent::delete($id);
        $this->db->where('recipeid', $id);
        $this->db->delete('ingredients');
    }

    public function oneRecipe($id) {
        $one = parent::get($id);
        $result = [];
        return $one;

    }

    public function updateRecipe($id, $data) {
        $this->db->where('id', $id)->update('menu', $data);
    }

    public function createRecipe($data) {
        $this->db->insert('menu', [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'href' => $data['name']
        ]);
        $result = $this->db->from('menu')->where('name', $data['name'])->get()->result();
        $id = $result[0]->id;
        foreach ($data['ingredients'] as $ingredient) {
            $this->db->insert('ingredients', [
                'recipeid' => $id,
                'receivingid' => $ingredient
            ]);
        }
    }
}