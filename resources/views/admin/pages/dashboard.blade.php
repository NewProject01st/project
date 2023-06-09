@extends('admin.layout.master')
@section('content')
    <?php $data_for_url = session('data_for_url'); ?>
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        .l-bg-cherry {
            background: #d24d4d73 !important;
            color: #fff;
        }

        .l-bg-blue-dark {
            background: #a2d9c6 !important;
            color: #fff;
        }

        .l-bg-green-dark {
            background: #9b9b9b8f !important;
            color: #fff;
        }

        .l-bg-orange-dark {
            background: #e2bfda !important;
            color: #fff;
        }

        .card .card-statistic-3 .card-icon-large .fas,
        .card .card-statistic-3 .card-icon-large .far,
        .card .card-statistic-3 .card-icon-large .fab,
        .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: -5px;
            top: 20px;
            opacity: 0.1;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }
    </style>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="row ">

                                        @forelse($return_data as $key => $dashboard)
                                            @if (in_array($dashboard['url'], $data_for_url))
                                                <div class="col-xl-3 col-lg-6">
                                                    <a href="{{ url($dashboard['url']) }}">
                                                        <div class="card"
                                                            style="background-color:#{{ str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) }}">
                                                            <div class="card-statistic-3 p-4">
                                                                <div class="card-icon card-icon-large"><i
                                                                        class="fas fa-shopping-cart"></i></div>
                                                                <div class="mb-4">
                                                                    <h5 class="mb-0">
                                                                        {{ $dashboard['permission_name'] }}</h5>
                                                                </div>
                                                                <div class="row align-items-center mb-2 d-flex">
                                                                    <div class="col-8">
                                                                        <h2 class="d-flex align-items-center mb-0">
                                                                            {{ $dashboard['count'] }}
                                                                        </h2>
                                                                    </div>
                                                                    {{-- <div class="col-4 text-right">
                                                                    <span>12.5% <i class="fa fa-arrow-up"></i></span>
                                                                </div> --}}
                                                                </div>
                                                                <div class="progress mt-1 " data-height="8"
                                                                    style="height: 8px;">
                                                                    <div class="progress-bar l-bg-cyan" role="progressbar"
                                                                        data-width="25%" aria-valuenow="25"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: 25%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @empty
                                            <h4>No Data Found For Dashboard</h4>
                                        @endforelse

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
