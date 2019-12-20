<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('master.adminStylesheet')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ url('/') }}">
                    <img src="/img/logo.png" width="200px" height="100%">
                </a>
            </div>

            <ul class="list-unstyled components">
                <p>Administrator Dashboard</p>
                <li>
                    <a href="{{ url('/admin') }}">Dashboard</a>
                </li>

                <li>
                    <a href="{{ url('/admin/movie/') }}">Movie Management</a>
                </li>

                <li>
                    <a href="{{ url('/admin/theatre/') }}">Theatre Management</a>
                </li>

                <li>
                    <a href="{{ url('/admin/shows/') }}">Show Management</a>
                </li>
                <li>
                    <a href="{{ url('/admin/review/' )}}">Review Management</a>
                </li>
            </ul>

            <div class="sidebar__border"></div>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ url('/') }}" class="article">Back to home</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="collapseBtn">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>
            </nav>

            
            @yield('adminContent')
        </div>
    </div>

    @include('master.adminScripts')
    <script>
        if(document.getElementById('chart'))
        {
            var ctx = document.getElementById('chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Users', 'Movies', 'Shows', 'Reviews'],
                    datasets: [{
                        data: 
                        [
                            <?php if ( isset($u) ) { echo $u . ","; } ?>
                            <?php if ( isset($m) ) { echo $m . ","; } ?>
                            <?php if ( isset($s) ) { echo $s . ","; } ?>
                            <?php if ( isset($r) ) { echo $r . ","; } ?>

                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    tooltips: {
                        enabled: true,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                           label: function(tooltipItem) {
                                  return tooltipItem.yLabel;
                           }
                        }
                    }
                }
            });
        }
        @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type)
            {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif
    </script>
</body>
</html>
