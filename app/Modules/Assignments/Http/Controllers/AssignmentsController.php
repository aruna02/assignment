<?php

namespace App\Modules\Assignments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Assignments\Repositories\AssignmentInterface;

class AssignmentsController extends Controller
{

     protected $assignment;

    public function __construct(AssignmentInterface $assignment)
    {
        $this->assignment = $assignment;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['assignments'] = $this->assignment->findAll(10);
        return view('assignments::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('assignments::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
         if ($request->hasFile('docs')) {
                $data['docs'] = $this->assignment->upload($data['docs']);

            }
            // dd($data);
         $assignment = $this->assignment->save($data);
        alertify()->success('Assignment Added Successfully');
        return redirect(route('assignments.index'));
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
         $data['assignment'] = $this->assignment->find($id);
        return view('assignments::show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['assignment'] = $this->assignment->find($id);
        return view('assignments::edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
      if ($request->hasFile('docs')) {
                $assignment = $this->assignment->find($id);
                $assignment_docs = $assignment->docs;
                if(!is_null($assignment_docs)){
                    $path = public_path()."/uploads/assignments/".$assignment_docs;
                    unlink($path);
                }
                $data['docs'] = $this->assignment->upload($data['docs']);
                // dd($data);
            }
        $assignments = $this->assignment->update($id, $data);
         alertify()->success('Assignment Updated Successfully');
       return redirect(route('assignments.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $assignment = $this->assignment->find($id);
            $assignment_docs = $assignment->docs;
            if(!is_null($assignment_docs)){
                $path = public_path()."/uploads/assignments/".$assignment_docs;
                unlink($path);
            }
            $this->assignment->delete($id);
            alertify()->success('Assignment Deleted Successfully');
            }
         catch (\Throwable $e) {
            alertify($e->getMessage())->error();
            }
        return redirect(route('assignments.index'));
    }

    
}
