<?php

/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/1/19
 * Time: 4:26 PM
 */

namespace App\Modules\Setting\Repositories;

interface SettingInterface
{
    public function find($id);

    public function save($data);

    public function update($id,$data);

}