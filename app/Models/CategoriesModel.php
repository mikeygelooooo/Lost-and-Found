<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

    // Get all categories
    public function getCategories()
    {
        return $this->findAll();
    }
}
