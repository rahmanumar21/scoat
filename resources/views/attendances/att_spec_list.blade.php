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
                <div class="col-lg-6 col-5 text-right">
              <Button onclick="exportTableToExcel('tblData')" id="createNewCountries" class="btn btn-icon btn-success"><span class="btn-inner--icon"><i class="fas fa-file-alt"></i></span>
              
                    <span class="btn-inner--text"> Excel </span></Button> 
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
 
                <div class="card-header border-0">
                        <h3 class="mb-0">

                        @foreach ($data as $dt)
                              @if ($loop->first && $dt->count() > 0)
                              {{$dt->course}}
                              @endif
                    @endforeach
                    </h3>

                </div>

                <!-- Light table -->
                <div class="table-responsive">
              <table id="tblData" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>N</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>In Class in</th>
                    <th>Attended Class</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                @forelse($data->unique('email') as $dt)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->addressline}}</td>
                    <td>{{$dt->updated_at->format('F j, Y, g:i a')}}</td>
                    <td>{{$dt->updated_at->diffForHumans()}}</td>
                    <td>
                    <a href="http://maps.apple.com/maps?q={{$dt->latitude}}, {{$dt->longtitude}}" data-original-title="Open Map" class="btn btn-icon btn-default btn-sm" target="_blank">
                    <span class="btn-inner--icon"><i class="fas fa-map"></i></span>
                    <span class="btn-inner--text">Map </span></a>

                    <a href="mailto: {{$dt->email}}" data-original-title="Message" class="btn btn-icon btn-info btn-sm" target="_blank">
                    <span class="btn-inner--icon"><i class="fa fa-envelope"></i></span>
                    <span class="btn-inner--text">Message </span></a>
                    @empty
                    <tr>
                    <td colspan="5">No Students in Class</td>
                    </tr>
                  @endforelse
                  </tr>

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

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    // Specify file name
    filename = filename?filename+'.xls':'attendances_' + dateTime + '.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

</script>


