<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Application;

class Invoice extends Model
{
    public int $visit_id = 0;
    public float $subtotal = 0;
    public float $vat_amount = 0;
    public float $total_amount = 0;

    public function rules(): array
    {
        return [];
    }

    public function save()
    {
        $sql = "INSERT INTO invoices (visit_id, subtotal, vat_amount, total_amount) VALUES (?, ?, ?, ?)";
        $stmt = Application::$app->db->prepare($sql);
        if (!$stmt) return false;
        
        return $stmt->execute([
            $this->visit_id, 
            $this->subtotal, 
            $this->vat_amount, 
            $this->total_amount
        ]);
    }
    
    public function findAll()
    {
        $sql = "SELECT i.*, p.full_name, p.national_id, v.arrival_time 
                FROM invoices i 
                JOIN visits v ON i.visit_id = v.id 
                JOIN patients p ON v.patient_id = p.id 
                ORDER BY i.created_at DESC";
        $result = Application::$app->db->query($sql);
        $invoices = [];
        if ($result) {
            while ($row = $result->fetch()) {
                $invoices[] = $row;
            }
        }
        return $invoices;
    }

    public function markAsPaid(int $id)
    {
        $sql = "UPDATE invoices SET status = 'paid' WHERE id = ?";
        $stmt = Application::$app->db->prepare($sql);
        if (!$stmt) return false;
        return $stmt->execute([$id]);
    }
}
