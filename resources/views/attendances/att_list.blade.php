<x-app-layout>

    <!-- Countries Breadcrumb -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Attendances') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Attendances') }}</li>
                            </ol>
                        </nav>
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
                    Attendances Data
                    </h3>

                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                    <table class="table align-items-center data-table" style="width:100%">
                           <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>In Class in</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
                ajax: "{{route('att_list.index')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'name', name:'name'},
                    {data: 'course', name:'course'},
                    {data: 'updated_at', name:'updated_at'},
                    {data: 'addressline', name:'addressline'},
                    {data: 'action', name:'action'}
                ]
            });
          
});

</script>




