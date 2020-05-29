<?php 

namespace App\Modules\Assignments\Repositories;

use Carbon\Carbon;
use App\Modules\Assignments\Entities\Assignment;
/**
 * AssignmentRepository
 */
class AssignmentRepository implements AssignmentInterface
{
	public function save($data)
	{
		return Assignment::create($data);
	}
	
	public function findAll($limit = 10)
	{
		return Assignment::latest()->paginate($limit);
	}

	public function find($id)
	{
		return Assignment::find($id);
	}

	public function update($id, $data)
	{
		return Assignment::find($id)->update($data);
	}

	public function delete($id)
	{
		return Assignment::find($id)->delete();
	}

	public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . Assignment::FILE_PATH, $fileName);
        return $fileName;
    }

}
