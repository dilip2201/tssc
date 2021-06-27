@extends('layout.app')
@section('action')
<div class="d-flex align-items-center">
    <a href="javascript:void(0);" class="btn btn-white font-weight-bold py-3 px-6 btn-add-user" data-id="" data-target=".add_modal" data-toggle="modal" >Add New</a>
</div>
<!--end::Toolbar-->
@endsection
@section('content')
@section('pageTitle', 'Users')

<!--begin::Container-->
<div class="container">
	<div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table id="users" class="table table-separate tableme-head-custom table-checkable kt_datatable_2" id="">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission Period</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
			<!--end: Datatable-->
		</div>
	</div>
<!--end::Container-->
    <!-- modal -->
    <div class="modal fade add_modal" >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modaltitle"></h5>
                </div>
                <div class="modal-body addeditform">
                    <div class="col-sm-12 col-md-12" style="text-align: center">
                        <span class="spinner-success spinner-lg addformspinner"></span>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

@push('link')
<link href="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/attempt-to-update-packagist/pnotify.js" integrity="sha512-vVCwjYtarAac2AMUNPP0cqRITQ00L8kXCRzUfLInqdz3iPUa/3kuBiXjhcEG4VaBLsBzgcChpq68qzUl1LAZ4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ URL::asset('public/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">

	$(document).ready(function () {

        /* datatable */
        $("#users").DataTable({
            "responsive": true,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: {
                'url': "{{ route('users.getall') }}",
                'type': 'POST',
                'data': function (d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columns: [
                {data: 'userId'},
                {data: 'name'},
                {data: 'email'},
                {data: 'role',"orderable": false},
                {data: 'permission_period'},
                {data: 'status',"orderable": false},
                {data: 'action', "orderable": false},
            ]
        });
        /********* Add New User ************/
        $('body').on('click', '.btn-add-user', function () {
            var id = $(this).data('id');
            if (id == '') {
                $('.modaltitle').text('Add User');
            } else {
                $('.modaltitle').text('Edit User');
            }
            $.ajax({
                url: "{{ route('users.getmodal')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {id: id},
                beforeSend: function () {
                    $('.addformspinner').addClass('spinner');
                },
                success: function (data) {
                    $('.addeditform').html(data);
                    $(".formsubmit").validate({
                        rules: {
                            "#password": {
                                required: true,
                                minlength: 6
                            },
                            "#password_confirmation": {
                                required: true,
                                minlength: 6,
                                equalTo: "#password"
                            }
                        }
                    });
                },
            });
        });
        /*********** Cancel form ***********/
        $('body').on('click', '.resetaddeditform', function () {
            let html = '<div class="col-sm-12 col-md-12" style="text-align: center">'+
                            '<span class="spinner-success spinner-lg addformspinner"></span>'+
                        '</div>';
            $('.addeditform').html(html);
        });
        /********** Submit form ************/
        $('body').on('submit', '.formsubmit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                data: new FormData(this),
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitbutton').addClass('spinner');
                },
                success: function (data) {

                    if (data.status == 400) {
                        $('.submitbutton').removeClass('spinner');
                        toastr.error(data.msg)
                    }
                    if (data.status == 200) {
                        $('.submitbutton').removeClass('spinner');
                        $('.add_modal').modal('hide');
                        $('#users').DataTable().ajax.reload();
                        toastr.success(data.msg,'Success!')
                    }
                },
            });
        });
        /********** Delete User ************/
        $('body').on('click', '.delete-user', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You want to delete the user.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{ url("users/delete") }}/' + id,
                        type: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if (data.status == 400) {
                                Swal.fire("Oh no!", "Something went wrong!", "error");
                            }
                            if (data.status == 200) {
                                $("#users").DataTable().ajax.reload();
                                Swal.fire(
                                    "Deleted!",
                                    data.msg,
                                    "success"
                                )
                            }
                        },
                        error: function () {
                            Swal.fire("Oh no!", "Something went wrong!", "error");
                        }
                    });
                }
            });
        });
        /********** change status **********/
        $('body').on('click', '.changestatus', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');
            Swal.fire({
                    title: "Are you sure?",
                    text: "You want to "+status+" the user.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{ route("users.changestatus") }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {id: id, status: status},
                        success: function (data) {
                            $("#users").DataTable().ajax.reload();
                            Swal.fire(
                                "Changed!",
                                "Status has been changed.",
                                "success"
                            )
                        },
                        error: function () {
                            Swal.fire("Oh no!", "Something went wrong!", "error");
                        }
                    });
                }
            });
        });
    });
</script>

@endpush
@endsection
