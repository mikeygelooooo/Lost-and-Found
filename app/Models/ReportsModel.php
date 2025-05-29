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
        'category',
        'date_of_event',
        'location',
        'description',
        'image',
        'reported_by',
        'created_at',
        'updated_at'
    ];

    // Landing Page Queries
    public function landingAllReports()
    {
        return $this->select('reports.*')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(8) // Limit to 8 results
            ->findAll();
    }

    // Admin Dashboard Queries
    public function dashboardAllReports()
    {
        return $this->select('reports.*')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    public function dashboardLostItems()
    {
        return $this->where('report_type', 'Lost')
            ->select('reports.*')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    public function dashboardFoundItems()
    {
        return $this->where('report_type', 'Found')
            ->select('reports.*')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->limit(10) // Limit to 10 results
            ->findAll();
    }

    // All Reports
    public function getAllReports()
    {
        return $this->select('reports.*')
            ->orderBy('reports.created_at', 'DESC') // Order by latest first
            ->findAll();
    }

    // Report Type Queries
    public function getLostItems()
    {
        return $this->where('report_type', 'Lost')
            ->select('reports.*')
            ->findAll();
    }

    public function getFoundItems()
    {
        return $this->where('report_type', 'Found')
            ->select('reports.*')
            ->findAll();
    }

    // Report Details
    public function getReportById($id)
    {
        return $this->select('reports.*, CONCAT(users.first_name, " ", users.last_name) as reported_by_name, users.email as reported_by_email, users.phone_number as reported_by_phone')
            ->join('users', 'users.id = reports.reported_by', 'left')
            ->where('reports.id', $id)
            ->first();
    }

    public function getCategoryEnumValues()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SHOW COLUMNS FROM {$this->table} WHERE Field = 'category'");
        $row = $query->getRow();

        if ($row && preg_match("/^enum\((.*)\)$/", $row->Type, $matches)) {
            $enumValues = str_getcsv($matches[1], ',', "'");
            return $enumValues;
        }

        return [];
    }
}
