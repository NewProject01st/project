@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Vacancies
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Vacancies</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-header-vacancies') }}" method="post"
                                id="formVacancy" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="english_title" id="english_title"
                                                placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $vacancy->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="marathi_title" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $vacancy->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf">
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                            <a
                                                href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $vacancy->english_pdf }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                class="form-control">
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <a
                                            href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $vacancy->marathi_pdf }}"></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $vacancy->url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-header-vacancies') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $vacancy->id }}" placeholder="">
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

                // $.validator.addMethod("urlValidation", function(value, element) {
                //     // Regular expression for URL validation
                //     var reg =
                //         /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
                //     return this.optional(element) || reg.test(value);
                // }, "Enter a valid URL");


                $("#formVacancy").validate({

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

                        // url_field: {
                        //     required: true,
                        //     urlValidation: true
                        // }


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

                        // url_field: {
                        //     required: "The URL field is required.",
                        //     urlValidation: "Enter a valid URL"
                        // }


                    }
                });
            });
        </script>
    @endsection
