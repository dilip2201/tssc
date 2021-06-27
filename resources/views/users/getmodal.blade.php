<form  autocorrect="off" action="{{ route('users.store') }}" autocomplete="off" method="post" class="form-horizontal form-bordered formsubmit">
    {{ csrf_field() }}

    @if(isset($user) && !empty($user->id) )
        <input type="hidden" name="userid" value="{{ encrypt($user->id) }}">
    @endif
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control " name="name"
                       placeholder="Name" minlength="3"
                       value="@if(!empty($user)){{ $user->name }}@endif" required="" maxlength="30">
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control " name="email"
                       placeholder="User Email"
                       value="@if(!empty($user)){{ $user->email }}@endif" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control " minlength="6" name="password"
                       placeholder="password"
                       value="" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" placeholder="Confirm Password"
                       name="password_confirmation" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="superadmin" @if(!empty($user) && $user->role == 'superadmin') selected @endif>Superadmin</option>
                    <option value="dashboard" @if(!empty($user) && $user->role == 'dashboard') selected @endif>Dashboard</option>
                    <option value="data_access_only" @if(!empty($user) && $user->role == 'data_access_only') selected @endif>Data Access</option>
                    <option value="data_access_without_import_export" @if(!empty($user) && $user->role == 'data_access_without_import_export') selected @endif>Data access without import/export</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="role">Permission Period</label>
                <input type="date" class="form-control " name="permission_period"
                       placeholder="Permission Period"
                       value="@if(!empty($user)){{$user->permission_period}}@endif" required>
            </div>
        </div>


        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label for="status">Status</label>
                <span class="switch switch-outline switch-icon switch-success">
                    <label>
                        <input type="checkbox" value="active" checked="checked" @if(!empty($user) && $user->status == 'active') checked="checked" @endif  name="status">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="">--}}

{{--                        <label>Profile Image</label>--}}
{{--                        <input type="file" name="image" accept="image/*"--}}
{{--                               class="logo_image" style="padding: 3px;"--}}
{{--                               placeholder="Profile image">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @php $image = url('public/company/employee/default.png'); @endphp--}}

{{--                @if(!empty($user) && file_exists(public_path().'/company/employee/'.$user->image) && !empty($user->image))--}}
{{--                    @php $image = url('public/company/employee/'.$user->image);  @endphp--}}
{{--                @endif--}}
{{--                <div class="col-sm-12 col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <span style=""><img src="{{$image}}" class="image_preview profile-user-img" width="auto" height="100px" style="margin-left: 60px;"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-md-12">
            <div class="text-right">
                <button type="submit" style="background: #71ba2b;color: #fff;font-weight: 500" class="btn submitbutton spinner-right spinner-white"> Save </button>
                <button type="reset" class="btn btn-secondary resetaddeditform" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</form>
