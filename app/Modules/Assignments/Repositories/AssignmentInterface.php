<?php 

namespace App\Modules\Assignments\Repositories;

interface AssignmentInterface
{
	public function save($data);
	public function findAll($limit);
	public function find($id);
	public function update($id, $data);
	public function delete($id);
	public function upload($file);
}
