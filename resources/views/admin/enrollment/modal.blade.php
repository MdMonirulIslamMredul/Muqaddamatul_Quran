{{-- Modal start here --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="enroll_certificate_form" class="form-horizontal" action="{{route('store.enrollment.certificate')}}" enctype="multipart/form-data" method="POST">
            @csrf
        <input type="hidden" name="id" id="enroll_id" value="">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {{-- <label>Upload Enrollment Certificate</label> --}}
                <input type="file" class="form-control" name="enroll_certificate" id="enroll_certificate">
                {{-- <input type="hidden" class="form-control" rows="5" name="personal_mobile" value="{{ $enroll_data->personal_mobile }}" id="personal_mobile">
                <input type="hidden" class="form-control" rows="5" name="user_id" value="{{ $enroll_data->user_id }}" id="user_id">
                <input type="hidden" class="form-control" rows="5" name="service_id" value="{{ $enroll_data->service_id }}" id="service_id"> --}}
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">upload</button>
        </div>
        </form>
    </div>
    </div>
</div>