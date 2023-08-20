@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const years = {!! json_encode($years) !!};
        const booksBorrowedPerYear = {!! json_encode(array_values($booksBorrowedPerYear)) !!};

        const options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            series: [{
                name: 'Books Borrowed',
                data: booksBorrowedPerYear,
            }],
            xaxis: {
                categories: years,
                title: {
                    text: 'Year',
                },
            },
            yaxis: {
                title: {
                    text: 'Number of Books Borrowed',
                },
            },
        };

        const chart = new ApexCharts(document.querySelector("#profileReportChart"), options);
        chart.render();
    });
</script>
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(2);
    };
</script>

<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<!-- Disable browser's back button on dashboard page -->
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

@endsection
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
          <h5>Bonjour {{ $name }}</h5>
          
            <p class="mb-4"><span class="fw-bold"></span> </p>

            <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
    <div class="col-lg-6 col-md-12 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('assets/img/icons/unicons/book.png')}}" alt="chart success" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Books</span>
            <h3 class="card-title mb-2">{{ $totalBooks }}</h3>
            <!-- You can add other content or styling for the card here -->
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-12 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/unicons/user.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                </div>
            </div>
            <span>Total Registered Users</span>
            <h3 class="card-title text-nowrap mb-1">{{ $totalUsers }}</h3>
            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> {{ $percentNewAgents }}% </small>
        </div>
    </div>
</div>
    </div>
  </div>
  <!-- Total Revenue -->
  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-8">
          <h5 class="card-header m-0 me-2 pb-3">Another statics</h5>
          <div id="totalRevenueChart" class="px-2"></div>
        </div>
        <div class="col-md-4">
          <div class="card-body">
            <div class="text-center">
              <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              choose category
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                <div class="dropdown-divider"></div>
      @foreach($categories as $category)
        <a class="dropdown-item" href="javascript:void(0);" onclick="filterData(null, '{{ $category }}')">{{ $category }}</a>
      @endforeach
                </div>
              </div>
            </div>
          </div>
          <div id="growthChart"></div>
          <div class="text-center fw-semibold pt-3 mb-2" id="borrowedBooksPercent">choose category first</div>
          <script>
  function filterData(category) {
    // Perform an AJAX call here to fetch data for the selected category
    // For demonstration purposes, let's assume you have received the data for the graph

    // Replace this with the actual data you received from the backend
    const growthData = [
      { year: '2021', total_books: 0 },
      { year: '2022', total_books: 0 },
      { year: '2023', total_books: 2 }
    ];

    const totalRevenueData = [
      { year: '2021', revenue: 0 },
      { year: '2022', revenue: 0 },
      { year: '2023', revenue: 2 }
    ];

    // Prepare data for the growth chart (Donut Chart)
    const growthYears = growthData.map(item => item.year);
    const booksBorrowed = growthData.map(item => item.total_books);

    // Update the "62% Company Growth" element with the percentage of borrowed books
    const borrowedBooksPercent = booksBorrowed.reduce((sum, count) => sum + count, 0) / booksBorrowed.length;
    const borrowedBooksPercentElement = document.getElementById('borrowedBooksPercent');
    borrowedBooksPercentElement.textContent = `${borrowedBooksPercent.toFixed(2)}% `;

    // Create or update the growth chart as a donut chart
    const growthChart = new ApexCharts(document.querySelector('#growthChart'), {
      chart: {
        type: 'donut',
        height: 350
      },
      series: booksBorrowed,
      labels: growthYears,
      dataLabels: {
        enabled: true
      },
      legend: {
        show: true
      }
    });

    growthChart.render();

    // Prepare data for the total revenue chart (Bar Chart)
    const revenueYears = totalRevenueData.map(item => item.year);
    const totalRevenue = totalRevenueData.map(item => item.revenue);

    // Create or update the total revenue chart as a bar chart
    const totalRevenueChart = new ApexCharts(document.querySelector('#totalRevenueChart'), {
      chart: {
        type: 'bar',
        height: 350
      },
      series: [
        {
          name: '',
          data: totalRevenue
        }
      ],
      xaxis: {
        categories: revenueYears,
        labels: {
          show: true
        }
      },
      yaxis: {
        title: {
          text: 'Growth'
        }
      },
      legend: {
        show: false
      },
      dataLabels: {
        enabled: true,
        offsetY: -15
      }
    });

    totalRevenueChart.render();
  }
</script>

          <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
    <div class="row">
    <div class="col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/unicons/overdue-48.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                </div>
            </div>
            <span class="d-block mb-1">overdue books</span>
            <h3 class="card-title text-nowrap mb-2">${{ $overdueBooks }}</h3>
            <small class="text-danger fw-semibold"><i class='bx bx-down-arrow-alt'></i> -{{ number_format($percentOverdueBooks, 2) }}%</small>
        </div>
    </div>
</div>
      <div class="col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/unicons/borrow.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
            <span class="fw-semibold d-block mb-1">Borrowed books</span>
            <h3 class="card-title mb-2">${{ $totalBorrowedBooks }}</h3>
            <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +{{ number_format($percentBorrowedBooks, 2) }}%</small>
        </div>
    </div>
</div>
      <!-- </div>
    <div class="row"> -->
    <div class="col-12 mb-4">
    <div class="col-12 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                        <h5 class="text-nowrap mb-2">Borrowe report</h5>
                        @foreach($years as $year)
                        <span class="badge bg-label-warning rounded-pill">Year {{ $year }}</span>
                        @endforeach
                    </div>
                    <div class="mt-sm-auto">
                        <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i></small>
                        <h3 class="mb-0">{{ $totalBooks }} books</h3>
                    </div>
                </div>
                <div id="profileReportChart"></div>
            </div>
        </div>
    </div>
</div>
</div>
    </div>
  </div>
</div>
<div class="row">
 

  <!-- Transactions -->
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Top borrowed books</h5>
            <!-- Dropdown Menu -->
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @foreach ($topBooks as $book)
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <!-- Book Avatar or Image -->
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Category: {{ $book->categorie }}</small>
                                <h6 class="mb-0">{{ $book->titre }}</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $book->borrow_count }} times borrowed</h6>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
  <!--/ Transactions -->
</div>
@endsection
