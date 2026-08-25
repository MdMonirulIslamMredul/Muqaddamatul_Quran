@extends('admin.master')
@section('body')
{{-- @dd($enrollments); --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Name</th>
                            <th>Roll No.</th>                           
                            <th>Number</th>                          
                            <th>Status</th>                            
                            <th>Upload</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->service->service_title ?? null }}</td>
                                <td>{{ $enrollment->user->name ?? null }}</td>
                                <td>{{ $enrollment->user->roll_no ?? null }}</td>                               
                                <td>
                                    @if($enrollment->personal_mobile)
                                    {{ $enrollment->personal_mobile ?? null }}
                                    @else
                                    {{ $enrollment->guardian_mobile ?? null }}
                                    @endif
                                </td>
                                <td>
                                    @if ($enrollment->status == 1)
                                        <button class="btn btn-sm btn-success">Paid</button>
                                    @elseif($enrollment->status == 0)
                                        <button class="btn btn-sm btn-warning">Unpaid</button>
                                    @endif
                                </td>
                                
                                <td>
                                      <button class="order-item-modal btn btn-primary"
                                        data-value="{{ json_encode($enrollment) }}">Upload Certificate</button>

                                   
                                    @include('admin.enrollment.modal')
                               {{-- <td>
                                <a href="{{ route('upload.enrollment.certificate',['id'=>$enrollment->id]) }}" class="btn btn-info btn-sm"><i class="bi bi-arrow-up"></i>Upload</a>
                               </td> --}}
                                  
                                </td>
                                <td>
                                <a href="{{ route('update.enrollment',['id'=>$enrollment->id]) }}" class="btn btn-primary btn-sm editProduct">
                                    {{ $enrollment->status == 1 ? 'Make Pending' : 'Approve'}}</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Button trigger modal -->

  
  <!-- Modal -->

</div>
  <script>
     $(document).ready(function()
     {
        $("body")
        .on("click",".order-item-modal",function(){
            let itemValue = $(this).data("value");
            // console.log(itemValue.id);
            $("#enroll_id").val(itemValue.id);
            $("#exampleModal").modal("show");
        })
        .on('hidden.bs.modal',"#exampleModal", function () {
    $(this).find('form').trigger('reset');
})
});
  </script>
@endsection
