@extends('layouts.partner.theme_partner')

@section('content')
<!doctype html>
<html lang="en">

<body>
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-4">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">รายการสั่งซื้อใน 28 วัน</p>
                                <h4 class="font-weight-bold">{{$order_28}} </h4>
                                <p class=" mb-0 font-13"><span class="text-success">{{ number_format(($order_28/$count_order)*100,1) }}% </span>จากทั้งหมด {{$count_order}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-cosmic text-white"><i class="fa-regular fa-arrow-trend-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">ลูกค้าใน 28 วัน </p>
                                <h4 class="font-weight-bold">{{$count_customer}}</h4>
                                <p class="text-secondary mb-0 font-13"><span class="text-success">{{ number_format(($customer_28/$count_customer)*100,1) }}%</span> จากทั้งหมด {{$count_customer}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-burning text-white"><i class="bx bx-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">สินค้าทั้งหมด </p>
                                <h4 class="font-weight-bold">{{$count_product}}</h4>
                                <p class="text-secondary mb-0 font-13"><br></p>

                            </div>
                            <br>
                            <div class="widgets-icons bg-gradient-lush text-white"><i class="bx bx-time"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">revenue 28 วัน</p>
                                <h4 class="font-weight-bold">{{ number_format($revenue_28) }}</h4>
                                <p class="text-secondary mb-0 font-13"><span class="text-success">{{ number_format(($revenue_28/$revenue)*100,1) }}%</span> จากทั้งหมด {{ number_format($revenue)}}</p>
                            </div>
                            <div class="widgets-icons bg-gradient-kyoto text-white"><i class="bx bxs-cube"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-12 col-xl-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">ลูกค้า</h5>
                            </div>
                        </div>
                    </div>
                    <div class="customers-list p-3 mb-3">
                        @foreach($customer as $item)
                        <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                            <div class="">
                                @if(!empty($item->profile->photo))
                                <img src="{{ url('storage/'.$item->profile->photo )}}" class="rounded-circle" width="46" height="46" alt="" />
                                @else
                                <img src="{{ url('/peddyhub/images/sticker/02.png') }}" class="rounded-circle" width="46" height="46" alt="" />
                                @endif
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-1 font-14">
                                    @if(!empty($item->profile->real_name))
                                    <h6 class="mb-1 font-14">{{$item->profile->real_name}}</h6>
                                    @elseif(!empty($item->profile->name))
                                    <h6 class="mb-1 font-14">{{$item->profile->name}}</h6>
                                    @else
                                    <h6 class="mb-1 font-14">{{$item->user->usesrname}}</h6>
                                    @endif
                                </h6>
                                <p class="mb-0 font-13 text-secondary">{{$item->user->email}}</p>
                            </div>
                            <div class="list-inline d-flex customers-contacts ms-auto">
                                <a href="mailto:{{$item->user->email}}" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
                                @if(!empty($item->profile->real_name))
                                <a href="tel:{{$item->profile->phone}}" class="list-inline-item"><i class='bx bxs-phone'></i></a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 d-flex">
                <div class="card radius-10 w-100 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">รายงานวันนี้</h5>
                            </div>
                        </div>
                    </div>

                    <div class="store-metrics p-3 mb-3">
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">ลูกค้า</p>
                                        <h4 class="mb-0">{{$customer_today}}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">สั่งซื้อวันนี้</p>
                                        <h4 class="mb-0">{{$order_today}}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none mb-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">รายได้</p>
                                        <h4 class="mb-0">{{ number_format($revenue_today)}}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4 d-flex">
                <div class="card radius-10 w-100 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">สินค้าขายดี</h5>
                            </div>
                        </div>
                    </div>

                    <div class="product-list p-3 mb-3">
                        @foreach($top_product as $item)
                        <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
                            <div class="product-img me-2">
                                <img src="{{ url('storage/'.$item->photo )}}" alt="product img">
                            </div>
                            <div class="">

                                <h6 class="mb-0 font-14">{{$item->title}}</h6>
                                <p class="mb-0">฿ {{number_format($item->price)}} /{{$item->total}} Sales</p>
                            </div>
                            <div class="ms-auto">
                                <h6 class="mb-0">฿ {{ number_format($item->total_price)}}</h6>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">การเข้าออกพื้นที่วันนี้</h5>
                                <div class="card-body">
                                    <p class="mb-1">เข้าออกทั้งหมด</p>
                                </div>
                            </div>
                            <div class="font-22 ms-auto">
                                <h2 class="mb-0">{{$checkin_today_count}} ครั้ง</h2>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-top-countries mb-3 p-3 ps ps--active-y">
                        @foreach($checkin_today as $item)
                        <div class="row mb-4">
                            <div class="col">
                                <p class="mb-2">{{$item->area_name}} <strong class="float-end">{{$item->count_checkin}}</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-blues" role="progressbar" style="width: {{$item->count_checkin /$checkin_today_count*100,1 }}%"></div>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8 d-flex">
                <div class="card radius-10 w-100 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">การเข้าออกพื้นที่ 15 วัน</h5>
                            </div>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var count_checkin = @json($count_checkin);
    var count = [count_checkin];
    var area_name = @json($area_name);
    var names = [area_name];

    var options = {
        series: [{
            data: count[0]
        }],
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'category',
            categories: names[0]
        },
        tooltip: {
            y: {
                formatter: undefined,
                title: {
                    formatter: (seriesName) => "จำนวน",
                },
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
@endsection