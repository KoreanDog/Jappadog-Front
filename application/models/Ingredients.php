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

    public function getByRecipeId($id) {
        //
    }

}