<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Application;

class Setting extends Model
{
    public string $hospital_name = 'مركز الطوارئ الطبي';
    public string $phone = '';
    public string $address = '';
    public string $vat_number = '';

    public function rules(): array
    {
        return [];
    }

    public function seedDefaults()
    {
        $res = Application::$app->db->query("SELECT COUNT(*) as cnt FROM settings");
        $row = $res->fetch();
        if ($row && $row['cnt'] == 0) {
            $defaults = [
                'hospital_name' => 'مركز الطوارئ الطبي الافتراضي',
                'phone' => '920000000',
                'address' => 'الرياض، المملكة العربية السعودية',
                'vat_number' => '300000000000003'
            ];
            $stmt = Application::$app->db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)");
            foreach ($defaults as $k => $v) {
                $stmt->execute([$k, $v]);
            }
        }
    }

    public function loadAll()
    {
        $this->seedDefaults();
        $res = Application::$app->db->query("SELECT * FROM settings");
        if ($res) {
            while ($row = $res->fetch()) {
                $key = $row['setting_key'];
                if (property_exists($this, $key)) {
                    $this->{$key} = $row['setting_value'];
                }
            }
        }
        return $this;
    }

    public function updateAll(array $data)
    {
        $stmt = Application::$app->db->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $stmt->execute([$value, $key]);
            }
        }
        return true;
    }
}
