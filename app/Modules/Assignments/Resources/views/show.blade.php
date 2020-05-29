<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>
      <thead>
          <tr>
              <th width='25%'></th>
              <th width='25%'></th>
              <th width='25%'></th>
              <th width='25%'></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td colspan='4'>
                <h3>Assignment Details</h3>
              </td>
          </tr>

          <tr>
              <td>Class</td>
              <td>{{ $assignment->class }}</td>
              <td>Section</td>
              <td>{{ $assignment->section }}</td>
          </tr>

           <tr>
              <td>Session</td>
              <td>{{ $assignment->session }}</td>
              <td>Subject</td>
              <td>{{ $assignment->subject }}</td>
          </tr>

           <tr>
              <td>Title</td>
              <td>{{ $assignment->title }}</td>
              <td>Description</td>
              <td>{{ $assignment->description }}</td>
          </tr>

           <tr>
              <td>Submission Date</td>
              <td>{{ $assignment->submission_date }}</td>
              <td>Download</td>
              <td>
                
                @if(!is_null($assignment->docs))
                <a class="btn bg-warning btn-icon rounded-round"  href="{{ asset('uploads/assignments/'.$assignment->docs) }}" download>
                                <i class="icon-download"></i>
                            </a>
                </a>
                @endif
                
            </td>
          </tr>

      </tbody>
</table>