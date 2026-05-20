<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Application;

class MedicalRecord extends Model
{
    public int $visit_id = 0;
    public int $doctor_id = 0;
    public string $diagnosis = '';
    public string $treatment_plan = '';
    public string $prescriptions = '';

    public function rules(): array
    {
        return [
            'visit_id' => ['required'],
            'diagnosis' => ['required']
        ];
    }

    public function save()
    {
        $sql = "INSERT INTO medical_records (visit_id, doctor_id, diagnosis, treatment_plan, prescriptions) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = Application::$app->db->prepare($sql);
        if (!$stmt) return false;
        
        return $stmt->execute([
            $this->visit_id, 
            $this->doctor_id, 
            $this->diagnosis, 
            $this->treatment_plan, 
            $this->prescriptions
        ]);
    }
}
