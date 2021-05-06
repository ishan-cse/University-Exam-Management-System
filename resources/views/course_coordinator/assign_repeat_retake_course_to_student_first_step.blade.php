@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_assigned_with_batch'))
  <script>
    swal({ title: "Done", text: "Course Assigned Successfully With Batch!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('course_assigned_without_batch'))
  <script>
    swal({ title: "Done", text: "Course Assigned Successfully Without Batch!", icon: "success", button: "Ok",});
  </script>
@endif


<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Repeat\Retake Course to Student : Step 1 </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/repeat_retake_course/student/first_step_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" value="{{$dept_id}}" name="dept_id" required>

          <div class="form-group row">
            <label for="student_id" class="col-sm-3 col-form-label">ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('student_id') is-invalid @enderror student_id" id="student_id" placeholder="Enter Student ID" name="student_id" required>
              @error('student_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                <option value="{{$trimester->id}}">{{$trimester->trimester_name}}</option>
                @endforeach
              </select>
            </div>
          </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Next Step</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>

<script>
/*
  $(function(){
    var student = $('input[name="student_id"]'),
      //  course = $('select[name="batch_course_list_id"]');



  student.change(function(){
    var id = $(this).val();
    console.log(id);


      type:'get',
      $.get('{{url('course_coordinator/assign/repeat_retake_course/student/first_step_process')}}'),
      data:{'stu_id':id},
        success(function(data){

      })

    }
  });
});
/*  $(document).ready(function (){
    $(document).on('change','.student_id',function(){
      //console.log('changing it');

      var id= $(this).val();
      var div=$(this).parent();


			var op=" ";

      //console.log(id);

      $.ajax({
        type:'get',
        url:'{!!URL::to('course_coordinator/assign/repeat_retake_course/student/first_step_process')!!}',
        data:{'stu_id':id},
        success:function(data){
          console.log(id);
          console.log('success done');
          console.log(data);
          console.log(data.length);

          op+='<option value="0" selected disabled>Select Course</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].batch_course_list_id+'">'+data[i].student_id+'</option>';
        }

        div.find('.batch_course_list_class').html(" ");
        div.find('.batch_course_list_class').append(op);

        },
      });
    });
  });
  */

</script>


@endsection
