<!DOCTYPE html>
<html>

<head>
    <title>DM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

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
                                                            <table id="example" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. No.</th>
                                                                        <th>Error Date </th>
                                                                        <th>Is Resolved</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data_output as $item)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $item->subject }}
                                                                            <td>
                                                                                @if ($item->is_resolved)
                                                                                    {{ 'Resolved' }}
                                                                                @else
                                                                                    {{ 'Yet to resolved' }}
                                                                                @endif
                                                                            </td>
                                                                            <td>

                                                                                <div class="d-flex">
                                                                                    <form method="POST"
                                                                                        action="{{ url('/show-error') }}"
                                                                                        id="showform">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                            name="show_id"
                                                                                            id="show_id"
                                                                                            value="{{ $item->id }}">
                                                                                        <input
                                                                                            class="edit-btn btn btn-sm btn-outline-primary m-1 mb-2"
                                                                                            type="submit"
                                                                                            value="View">
                                                                                    </form>
                                                                                    @if (!$item->is_resolved)
                                                                                        <form method="POST"
                                                                                            action="{{ url('/resolve-error') }}"
                                                                                            id="showform">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                name="show_id"
                                                                                                id="show_id"
                                                                                                value="{{ $item->id }}">
                                                                                            <input
                                                                                                class="edit-btn btn btn-sm btn-outline-primary m-1"
                                                                                                type="submit"
                                                                                                value="Resolved">
                                                                                        </form>
                                                                                    @endif

                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
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
    <script>
        $('#show-btn').click(function(e) {
            $("#show_id").val($(this).attr("data-id"));
            $("#showform").submit();
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pagingType: 'full_numbers',
            });
        });
    </script>
</body>

</html>
