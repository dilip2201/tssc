<div class="row">
    @if(!empty($salesdata))
        <div class="col-sm-12 col-md-4">
            <label style="font-weight: 500;font-size: 15px;width: 100%">OrderId</label>
            {{ (!empty($salesdata->order_id)) ? $salesdata->order_id :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Name</label>
            {{ (!empty($salesdata->name)) ? $salesdata->name :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Email</label>
            {{ (!empty($salesdata->email)) ? $salesdata->email :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Created</label>
            {{ (!empty($salesdata->created)) ? date('d M Y',strtotime($salesdata->created)) : 'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Status</label>
            {{ (!empty($salesdata->status)) ? $salesdata->status :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Payment Method</label>
            {{ (!empty($salesdata->payment_method)) ? $salesdata->payment_method :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Payment Status</label>
            {{ (!empty($salesdata->payment_status)) ? $salesdata->payment_status :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Total</label>
            {{ (!empty($salesdata->total)) ? $salesdata->total :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Device</label>
            {{ (!empty($salesdata->device)) ? $salesdata->device :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Sales</label>
            {{ (!empty($salesdata->sales)) ? $salesdata->sales :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Source</label>
            {{ (!empty($salesdata->source)) ? $salesdata->source :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Taken By</label>
            {{ (!empty($salesdata->taken_by)) ? $salesdata->taken_by :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Postal Code</label>
            {{ (!empty($salesdata->postcode)) ? $salesdata->postcode :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Sales Post Code</label>
            {{ (!empty($salesdata->spostcode)) ? $salesdata->spostcode :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Company</label>
            {{ (!empty($salesdata->company)) ? $salesdata->company :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-2 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Shipping</label>
            {{ (!empty($salesdata->shipping)) ? $salesdata->shipping :  'N/A' }}

        </div>
        <div class="col-sm-12 col-md-2 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Time</label>
            {{ (!empty($salesdata->time)) ? date('h : i',strtotime($salesdata->time)) : 'N/A' }}
        </div>
        <div class="col-sm-12 col-md-3 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">B City</label>
            {{ (!empty($salesdata->b_city)) ? $salesdata->b_city :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-2 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">SKUs</label>
            {{ (!empty($salesdata->skus)) ? $salesdata->skus :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-2 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Actions</label>
            {{ (!empty($salesdata->actions)) ? $salesdata->actions :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-3 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Main Industry</label>
            {{ (!empty($salesdata->main_industry)) ? $salesdata->main_industry :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-3 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Sub Industry</label>
            {{ (!empty($salesdata->sub_industry)) ? $salesdata->sub_industry :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-2 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Type</label>
            {{ (!empty($salesdata->type)) ? $salesdata->type :  'N/A' }}
        </div>
        <div class="col-sm-12 col-md-4 mt-10">
            <label style="font-weight: 500;font-size: 15px;width: 100%">Reference Link</label>
            {{ (!empty($salesdata->reference_link)) ? $salesdata->reference_link :  'N/A' }}
        </div>
    @else

        <div class="col-md-12">
            <div class="text-center">
                No Records Found!
            </div>
        </div>
    @endif
        <div class="col-md-12">
            <div class="text-right">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
</div>
