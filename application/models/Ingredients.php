<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 11/12/16
 * Time: 4:33 PM
 */
class Ingredients extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_tableName = 'ingredients';
    }

    public function updateRecipe($id, $ingredients) {
        $this->db->where('recipeid', $id);
        $this->db->delete('ingredients');
        foreach ($ingredients as $key => $value) {
            $this->db->insert('ingredients', [
                'recipeid' => $id,
                'receivingid' => $value
            ]);
        }
    }

}