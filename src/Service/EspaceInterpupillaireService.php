<?php

namespace App\Service;

class EspaceInterpupillaireService {


   
    public function infoUser($form)
    {
        $fields = ['Gx', 'Gy', 'Gz', 'Dx', 'Dy', 'Dz'];
        $data = [];

        foreach ($fields as $field) {
            $data[$field] = $form->get($field)->getData();
        }
        
        $gx = $data['Gx'];
        $gy = $data['Gy'];
        $gz = $data['Gz'];
        $dx = $data['Dx'];
        $dy = $data['Dy'];
        $dz = $data['Dz'];
     
        $DIP = sqrt(pow($gx - $dx, 2) + pow($gy - $dy, 2) + pow($gz - $dz, 2));
        $DIP_mm = round($DIP, 2);

        return $DIP_mm;
    }
}