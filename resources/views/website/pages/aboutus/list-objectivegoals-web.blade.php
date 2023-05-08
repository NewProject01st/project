<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        My Website
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('website_files/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/custom.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('website_files/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/bootstrap.js') }}"></script>
    <script src="{{ asset('website_files/ajax/libs/jquery/1.12.2/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('website_files/asset/images/favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div>
        @foreach ($objectivegoals as $item)
        <div>
        @if (session('language') == 'mar')
        {{ $menu_data_sub['marathi_title'] }}
        @else
            {{ $menu_data_sub['english_title'] }}
        @endif
          
        </div>
                                                    {{-- <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><?php echo $item->english_title; ?></td>
                                                        <td><?php echo $item->marathi_title; ?></td>
                                                        <td><?php echo $item->english_description; ?></td>
                                                        <td><?php echo $item->marathi_description; ?></td>
                                                        <td class="d-flex">
                                                            <a data-id="{{ $item->id }}"
                                                                class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                title="Delete Tender"><i class="fas fa-archive"></i></a>
                                                        </td>
                                                    </tr> --}}
                                                @endforeach
    </div>

</body>

</html>