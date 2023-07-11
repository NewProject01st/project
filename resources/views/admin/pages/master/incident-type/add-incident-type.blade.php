@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Incident Type
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Incident Type</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-incident-type') }}" method="POST"
                                enctype="multipart/form-data" id="formid">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" value="{{ old('english_title') }}"
                                                placeholder="Enter the Title">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_title"
                                                id="marathi_title" value="{{ old('marathi_title') }}"
                                                placeholder="शीर्षक प्रविष्ट करा">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-incident-type') }}"
                                                class="btn btn-sm btn-primary">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $.extend($.validator.methods, {
                    spcenotallow: function(b, c, d) {
                        if (!this.depend(d, c)) return "dependency-mismatch";
                        if ("select" === c.nodeName.toLowerCase()) {
                            var e = a(c).val();
                            return e && e.length > 0
                        }
                        return this.checkable(c) ? this.getLength(b, c) > 0 : b.trim().length > 0
                    }
                });

                $.validator.addMethod("alphanumericwithspace", function(value, element) {
                    var reg = /[0-9]/;
                    if (reg.test(value)) {
                        return false;
                    } else {
                        return true;
                    }
                }, "Number is not permitted");


                $("#formid").validate({
                    
                    rules: {
                        english_title: {
                            required: true,
                            spcenotallow: true,
                            alphanumericwithspace: true
                        },
                        marathi_title: {
                            required: true,
                            spcenotallow: true,
                            alphanumericwithspace: true
                        },


                    },
                    messages: {
                        english_title: {
                            required: "The english title field is required.",
                            spcenotallow: "Enter Some Text",
                            alphanumericwithspace: "Enter Valid Input"

                        },

                        marathi_title: {
                            required: "The english title field is required.",
                            spcenotallow: "Enter Some Text",
                            alphanumericwithspace: "Enter Valid Input"

                        },
                    }
                });
            });
        </script>
    @endsection
