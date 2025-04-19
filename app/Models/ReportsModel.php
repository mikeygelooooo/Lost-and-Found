<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportsModel extends Model
{
    protected $table      = 'reports';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'report_type',
        'item_name',
        'category_id',
        'date_of_event',
        'location',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];

    // Landing Page Queries
    public function landingAllReports()
    {
        return $this->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(8) // Limit to 8 results
            ->findAll();
    }

    // Admin Dashboard Queries
    public function dashboardAllReports()
    {
        return $this->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    public function dashboardLostItems()
    {
        return $this->where('report_type', 'Lost')
            ->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    public function dashboardFoundItems()
    {
        return $this->where('report_type', 'Found')
            ->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    // All Reports
    public function getAllReports()
    {
        return $this->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->findAll();
    }

    // Report Type Queries
    public function getLostItems()
    {
        return $this->where('report_type', 'Lost')
            ->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->findAll();
    }

    public function getFoundItems()
    {
        return $this->where('report_type', 'Found')
            ->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->findAll();
    }

    // Report Details
    public function getReportById($id)
    {
        return $this->where('reports.id', $id)
            ->join('categories', 'categories.id = reports.category_id')
            ->select('reports.*, categories.name as category_name')
            ->first();
    }
}
