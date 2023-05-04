@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
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
                            <form class="forms-sample" action='{{ route('update-main-menu') }}' method="post"
                                id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="menu_name_english">Menu Name English</label>
                                            <input type="text" name="menu_name_english" id="menu_name_english"
                                                class="form-control" id="exampleInputUsername1" placeholder="" value="{{ $main_menu_data->menu_name_english }}">
                                            @if ($errors->has('menu_name_english'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="menu_name_marathi">Menu Name Marathi</label>
                                            <input type="text" name="menu_name_marathi" id="menu_name_marathi"
                                                class="form-control" id="exampleInputUsername1" placeholder="" value="{{ $main_menu_data->menu_name_marathi }}">
                                            @if ($errors->has('menu_name_marathi'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="col-md-12 col-sm-12 text-center">
                                    <input type="hidden" name="edit_id" id="edit_id"
                                                class="form-control" value="{{ $edit_data_id }}">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
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
