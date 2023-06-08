@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Sub Main Menu
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Main Menu</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action='{{ route('add-sub-menu') }}' method="post" id="regForm">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="menu_name_english">Main Menu</label>&nbsp<span
                                            class="red-text">*</span>
                                        <select class="form-select form-control" name="main_menu_id" id="main_menu_id"
                                            aria-label="Default select example">
                                            <option selected>Select Name</option>
                                            @foreach ($main_menu_data as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->menu_name_english }}({{ $data->menu_name_marathi }})
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="menu_name_english">Sub Menu Name English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="menu_name_english" id="menu_name_english"
                                            class="form-control" id="exampleInputUsername1" placeholder="">
                                        @if ($errors->has('menu_name_english'))
                                        <span
                                            class="red-text"><?php echo $errors->first('menu_name_english', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="menu_name_marathi">Sub Menu Name Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="menu_name_marathi" id="menu_name_marathi"
                                            class="form-control" id="exampleInputUsername1" placeholder="">
                                        @if ($errors->has('menu_name_marathi'))
                                        <span
                                            class="red-text"><?php echo $errors->first('menu_name_marathi', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
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
    @endsection