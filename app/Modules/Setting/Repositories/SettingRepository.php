<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:27 PM
 */

namespace App\Modules\Setting\Repositories;

use App\Modules\Setting\Entities\Setting;

class SettingRepository implements SettingInterface
{

    public function find($id){
        return Setting::find($id);
    }

    public function save($data){
        return Setting::create($data);
    }

    public function update($id,$data){
        $setting = $this->find($id);
        return $setting->update($data);
    }
    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Setting::FILE_PATH, $fileName);

        return $fileName;
    }






}