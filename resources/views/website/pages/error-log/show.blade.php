<!DOCTYPE html>
<html>

<head>
    <title>DM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <!--  brand logo -->
                    <div class="row w-100 ">
                        <div class="col-lg-12 mx-auto">
                            <div class="auth-form-light text-center login_wrap">

                                <div class="row">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <div
                                                                class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary ml-3 back"
                                                                        onclick="history.back()">Go Back</button>

                                                                </div>
                                                            </div>
                                                            <table id="example" class="table table-bordered">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>Error Date</td>
                                                                        <td>{{ $data_output->subject }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Error Content </td>
                                                                        <td> {{ '<pre>' }}
                                                                            {{ $data_output->messege }} </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>

                                                            <div
                                                                class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary ml-3 back"
                                                                        onclick="history.back()">Go Back</button>

                                                                </div>

                                                                <div class="d-flex">
                                                                    <form method="POST" action="{{ url('/resolve-error') }}" id="showform">
                                                                        @csrf
                                                                        <input type="hidden" name="show_id" id="show_id" value="{{ $data_output->id }}">
                                                                        <input class="btn btn-sm btn-primary ml-3 back" type="submit" value="Resolved">
                                                                    </form>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
   
</body>

</html>
