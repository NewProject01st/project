{{ $email_data['otp'] }}

<form class="forms-sample" action="{{ url('emailotp') }}" method="POST" enctype="multipart/form-data" id="regForm">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="otp_number">Title</label>&nbsp<span class="red-text">*</span>
                <input class="form-control" name="otp_number" id="otp_number" placeholder="Enter the otp">
                @if ($errors->has('otp_number'))
                    <span class="red-text"><?php echo $errors->first('otp_number', ':message'); ?></span>
                @endif
            </div>
        </div>
        <div class="col-md-12 col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Save &amp; Submit</button>
            {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
            <span><a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary ">Back</a></span>
        </div>
    </div>
</form>
