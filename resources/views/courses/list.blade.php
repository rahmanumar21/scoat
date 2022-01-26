<x-app-layout>

    <!-- Countries Breadcrumb -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Courses') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Courses') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
              <a href="javascript:void(0)" id="createNewCountries" class="btn btn-sm btn-neutral">New</a> 
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Countries Data Table -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 50px">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">
                    Courses Data
                    </h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                    <table class="table align-items-center data-table" style="width:100%">
                           <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                        <div class="modal fade" id="ajaxModel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modalHeading"></h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <div class="text-center text-muted mb-4">
                                            <small>Add new course here</small>
                                        </div>
                                            <form id="countryForm" name="countryForm">
                                                <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input type="hidden" name="course_id" class="form-control" id="course_id">
                                                    <input type="hidden" name="lecturer_id" class="form-control" id="lecturer_id" value="2">
                                                    <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course Name" value="" required>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="course_url_link" name="course_url_link" placeholder="Enter URL Link" value="" required>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="time_start" name="time_start" placeholder="Enter Time Start" value="" required>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="time_end" name="time_end" placeholder="Enter Time End" value="" required>
                                                </div>
                                                </div>
                                                <div class="text-center">
                                                <button type="button" class="btn btn-primary my-4" id="saveButton" value="Create">Sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>



<!-- Start Ajax -->
<script type="text/javascript">

// Ajax Function to Handle Data
$(function(){
    
    // Start Ajax & Security Data
    $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"').attr('content')
            }
        });
          
            // Show or Display Data List
            var table = $(".data-table").DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{route('courses.list')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'course', name:'course'},
                    {data: 'action', name:'action'},
                ]
            });


             // Open or Show Modal Dialog
             $("#createNewCountries").click(function(){
                $("#course_id").val('');
                $("#countryForm").trigger("reset");
                $("#modalHeading").html('Add New');
                $('#ajaxModel').modal('show');
            });

            // Store or Save Data
            $("#saveButton").click(function(e){
                e.preventDefault();
                $(this).html('save');

                $.ajax({
                    data:$("#countryForm").serialize(),
                    url: "{{ route('courses.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success:function(data){
                        $("#countryForm").trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error:function(data){
                        console.log('Error:', data);
                        $("#saveButton").html('Save');
                    }  
                });

            });

            // Remove or Delete Data
            $('body').on('click','.deleteCourse', function(){
                var course_id = $(this).data("id");
                confirm("Are you sure want to delete!");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('courses.store')}}"+'/'+course_id,
                    success:function(data){
                        table.draw();
                    },
                    error: function(data){
                        console.log('Error:', data);
                    }
                });
            });

                        // Update or Edit Data
            $('body').on('click','.editCourse', function(){
                var course_id = $(this).data('id');
                
                $.get("{{ route('courses.list') }}" + "/" + course_id + "/edit", function(data){
                    $("madelHeading").html("Edit Data");
                    $('#ajaxModel').modal('show');
                    $("#course_id").val(data.id);
                    $("#lecturer_id").val(data.lecturer_id);
                    $("#course").val(data.course);
                    $("#course_url_link").val(data.course_url_link);
                    $("#time_start").val(data.time_start);
                    $("#time_end").val(data.time_end);
                });
            });

});

</script>




