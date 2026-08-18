@extends('backend.master')

@section('title', 'Dashboard')

@section('content')
<section class="content">
    @can('dashboard_view')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box ds-stat-card">
                    <span class="info-box-icon ds-icon-primary"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sale SubTotal</span>
                        <span class="info-box-number">
                            {{currency()->symbol??''}} {{number_format($sub_total,2,'.',',')}}
                            <small></small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 ds-stat-card">
                    <span class="info-box-icon ds-icon-danger"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sale Discount</span>
                        <span class="info-box-number">{{currency()->symbol??''}} {{number_format($discount,2,'.',',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 ds-stat-card">
                    <span class="info-box-icon ds-icon-success"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sale</span>
                        <span class="info-box-number">{{currency()->symbol??''}} {{number_format($total,2,'.',',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 ds-stat-card">
                    <span class="info-box-icon ds-icon-warning"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sale Due </span>
                        <span class="info-box-number">{{currency()->symbol??''}} {{number_format($due,2,'.',',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>



        <div class="row">
            <div class="col-6">
                <div class="card ds-stat-card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center" style="gap: 1rem;">
                        <h5 class="mb-0">Daily Total Sales</h5>
                        <div class="input-group ds-datepicker-group ml-auto" style="width: 250px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="reservation">
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="dailySaleLineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card ds-stat-card">
                    <div class="card-header">
                        <h5>Monthly Total Sales <small>for {{ $currentYear }}</small></h5>
                    </div>
                    <div class="card-body">
                        <canvas id="barChartYear"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row mt-4">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info ds-quick-stat hover-lift">
                    <div class="inner">
                        <h3>{{$total_customer}}</h3>
                        <p>Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('backend.admin.customers.index')}}" class="small-box-footer">
                        More info
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success ds-quick-stat hover-lift">
                    <div class="inner">
                        <h3>{{$total_product}}</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('backend.admin.products.index')}}" class="small-box-footer">
                        More info
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning ds-quick-stat hover-lift">
                    <div class="inner">
                        <h3>{{$total_order}}</h3>
                        <p>Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('backend.admin.orders.index')}}" class="small-box-footer">
                        More info
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger ds-quick-stat hover-lift">
                    <div class="inner">
                        <h3>{{$total_sale_item}}</h3>
                        <p>Sale Item</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('backend.admin.orders.index')}}" class="small-box-footer">
                        More info
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row mt-4">
            <div class="col-12 col-lg-6">
                <div class="card ds-stat-card">
                    <div class="card-header">
                        <h5 class="mb-0">Cash Flow</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="cashFlowChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card ds-stat-card">
                    <div class="card-header">
                        <h5 class="mb-0">Yearly Report</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="yearlyReportChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- /.container-fluid -->
</section>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const dailySaleChart = document.getElementById('dailySaleLineChart');
    const barChartYear = document.getElementById('barChartYear');

    new Chart(dailySaleChart, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [{
                label: 'Sales',
                data: @json($totalAmounts),
                borderWidth: 2,
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    new Chart(barChartYear, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Sales',
                data: @json($totalAmountMonth),
                borderWidth: 0,
                backgroundColor: '#0D9488',
                borderRadius: 6,
                barPercentage: 0.6
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    const cashFlowChart = document.getElementById('cashFlowChart');
    const yearlyReportChart = document.getElementById('yearlyReportChart');

    new Chart(cashFlowChart, {
        type: 'line',
        data: {
            labels: @json($monthNames),
            datasets: [
                {
                    label: 'Payment Received',
                    data: @json($paymentReceivedMonth),
                    borderWidth: 2,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0,
                    fill: false,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: 'Payment Sent',
                    data: @json($paymentSentMonth),
                    borderWidth: 2,
                    borderColor: '#f97316',
                    backgroundColor: 'rgba(249, 115, 22, 0.1)',
                    tension: 0,
                    fill: false,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: true, position: 'top' }
            }
        }
    });

    new Chart(yearlyReportChart, {
        type: 'bar',
        data: {
            labels: @json($monthNames),
            datasets: [
                {
                    label: 'Purchased Amount',
                    data: @json($purchasedAmountMonth),
                    borderWidth: 0,
                    backgroundColor: '#60a5fa',
                    borderRadius: 2,
                    barPercentage: 0.6,
                    categoryPercentage: 0.8
                },
                {
                    label: 'Sold Amount',
                    data: @json($soldAmountMonth),
                    borderWidth: 0,
                    backgroundColor: '#fb923c',
                    borderRadius: 2,
                    barPercentage: 0.6,
                    categoryPercentage: 0.8
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: true, position: 'top' }
            }
        }
    });
</script>
<script>
    $(function() {
        //Date range picker
        $('#reservation').daterangepicker().on('apply.daterangepicker', function(e, picker) {
            let selectedDateRange = picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD');

            // Update URL with daterange query parameter
            let url = new URL(window.location.href);
            url.searchParams.set('daterange', selectedDateRange);
            window.location.href = url.toString();
        });

    })
</script>
@endpush