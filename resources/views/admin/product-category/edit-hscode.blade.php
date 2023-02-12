
<div class="row clearfix">
    <div class="col-lg-12">
        <form action="{{ url('products/category/hs-code/update') }}/{{ encrypt($hs_code->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-12">
                    <label class="col-form-label"> Country </label>
                    <span class="text-primary">*</span>
                    <select class="form-control select-2" name="country_id" required>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id==$hs_code->country_id ? "selected": ""}}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                <label class="col-form-label"> HS Code </label>
                <span class="text-primary">*</span>
                    <input type="text" name="hs_code" class="form-control"  value="{{ $hs_code->hs_code }}" required>
                </div>
                <div class="col-12">
                <label class="col-form-label"> Duty Charges  (%) </label>
                <span class="text-primary">*</span>
                    <input type="text" step="any" name="duty_charges" class="form-control"  value="{{ $hs_code->duty_charges }}" required>
                </div>
                <div class="col-12 mt-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
            <br>
        </form>
    </div>
</div>

