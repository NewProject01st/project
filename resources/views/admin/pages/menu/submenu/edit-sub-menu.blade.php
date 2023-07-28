@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Sub Main Menu
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-sub-menu') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sub Menu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-sub-menu') }}' method="post"
                                id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_name_english">Menu Name English</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="menu_name_english" id="menu_name_english"
                                                class="form-control" id="menu_name_english" placeholder=""
                                                value="@if (old('menu_name_english')) {{ old('menu_name_english') }}@else{{ $main_menu_data->menu_name_english }} @endif">
                                            @if ($errors->has('menu_name_english'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_name_marathi">Menu Name Marathi</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="menu_name_marathi" id="menu_name_marathi"
                                                class="form-control" id="menu_name_marathi" placeholder=""
                                                value="@if (old('menu_name_marathi')) {{ old('menu_name_marathi') }}@else{{ $main_menu_data->menu_name_marathi }} @endif">
                                            @if ($errors->has('menu_name_marathi'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" name="edit_id" id="edit_id" class="form-control"
                                            value="{{ $edit_data_id }}">
                                            <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>Save &amp;
                                                Update</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-sub-menu') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    
                    const menu_name_english = $('#menu_name_english').val();
                    const menu_name_marathi = $('#menu_name_marathi').val();

                    // Enable the submit button if all fields are valid
                    if (menu_name_english && menu_name_marathi) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input, select').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        menu_name_english: {
                            required: true,
                        },
                        menu_name_marathi: {
                            required: true,
                        },
                    },
                    messages: {
                        menu_name_english: {
                            required: "Please Enter the Menu Name",
                        },
                        menu_name_marathi: {
                            required: "कृपया मेनूचे नाव प्रविष्ट करा",
                        },
                    },
                });
            });
        </script>
    @endsection
