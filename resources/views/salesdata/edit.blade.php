<form autocorrect="off" action="{{ url('salesdata/store') }}" autocomplete="off" method="post"
      class="form-horizontal form-bordered formsubmit">
    @if(!empty($salesdata))
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ encrypt($salesdata->id) }}">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>OrderId</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="order_id"
                           placeholder="OrderId" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->order_id }}@endif"  readonly
                           maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Name</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="name"
                           placeholder="Name" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->name }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="email"
                           placeholder="Email"
                           value="@if(!empty($salesdata)){{ $salesdata->email }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>Created Date</label>
                    <input type="Date" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="created"
                           placeholder="Created Date"
                           value="@if(!empty($salesdata)){{ $salesdata->created }}@endif" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Status</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="status"
                           placeholder="Status" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->status }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Payment Method</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="payment_method"
                           placeholder="Payment Method" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->payment_method }}@endif"
                           maxlength="30">

                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Payment Status</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="payment_status"
                           placeholder="Payment Status" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->payment_status }}@endif"
                           maxlength="30">

                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Total</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="total"
                           placeholder="Total"
                           value="@if(!empty($salesdata)){{ $salesdata->total }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Device</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="device"
                           placeholder="Device" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->device }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Sales</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="sales"
                           placeholder="Sales" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->sales }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Source</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="source"
                           placeholder="Source"
                           value="@if(!empty($salesdata)){{ $salesdata->source }}@endif" >
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Taken By</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="taken_by"
                           placeholder="Taken By" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->taken_by }}@endif"  maxlength="30">
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Postal Code</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="postcode"
                           placeholder="Source"
                           value="@if(!empty($salesdata)){{ $salesdata->postcode }}@endif" >
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Sales Post Code</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="spostcode"
                           placeholder="Source"
                           value="@if(!empty($salesdata)){{ $salesdata->spostcode }}@endif" >
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role">Company</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="company"
                           placeholder="Company" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->company }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <label for="role">Shipping</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="shipping"
                           placeholder="Shipping" minlength="3"
                           value="@if(!empty($salesdata)){{ $salesdata->shipping }}@endif"  maxlength="30">
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">Time</label>
                    <input type="time" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="time"
                           placeholder="Time"
                           value="@if(!empty($salesdata)){{ $salesdata->time }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">City</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="b_city"
                           placeholder="City"
                           value="@if(!empty($salesdata)){{ $salesdata->b_city }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <label for="role">SKU</label>
                    <input type="number" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="skus"
                           placeholder="SKUS" maxlength="2"
                           value="@if(!empty($salesdata)){{ $salesdata->skus }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <label for="role">Actions</label>
                    <input type="text" class="form-control " maxlength="30" style="box-shadow: 2px 2px #d8d8d8;" name="actions"
                           placeholder="Actions"
                           value="@if(!empty($salesdata)){{ $salesdata->actions }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">Main Industry</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="main_industry"
                           placeholder="Main Industry" maxlength="30"
                           value="@if(!empty($salesdata)){{ $salesdata->main_industry }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">Sub Industry</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="sub_industry"
                           placeholder="Sub Industry" maxlength="30"
                           value="@if(!empty($salesdata)){{ $salesdata->sub_industry }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">Type</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="type"
                           placeholder="Type" maxlength="30"
                           value="@if(!empty($salesdata)){{ $salesdata->type }}@endif" >
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="role">Reference Link</label>
                    <input type="text" class="form-control " style="box-shadow: 2px 2px #d8d8d8;" name="reference_link"
                           placeholder="Reference Link"
                           value="@if(!empty($salesdata)){{ $salesdata->reference_link }}@endif" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="text-right">
                    <button type="submit" style="background: #71ba2b;color: #fff;font-weight: 500"
                            class="btn submitbutton spinner-right spinner-white"> Save
                    </button>
                    <button type="reset" class="btn btn-secondary resetaddeditform" data-dismiss="modal"
                            aria-label="Close">Cancel
                    </button>
                </div>
            </div>
        </div>
    @else
        No records Found!

        <div class="col-md-12">
            <div class="text-right">
                <button type="reset" class="btn btn-secondary resetaddeditform" data-dismiss="modal" aria-label="Close">
                    Cancel
                </button>
            </div>
        </div>
    @endif
</form>
