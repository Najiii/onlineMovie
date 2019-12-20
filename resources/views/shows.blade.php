<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $show->movie_name }} at {{ $show->theatre_name }}</title>

        @include('master.stylesheet') 
        <link rel="stylesheet" href="/css/seat_style.css" type="text/css" media="all">
    </head>
    <body class="body">
        <div class="sign section--bg" data-bg="/img/section/section.jpg" style="background: url('/img/section/section.jpg') no-repeat center; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; -ms-background-size: cover; background-attachment: fixed;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="show__form">
                            <div class="inputForm">
                                <div class="mr_agilemain">
                                    <div class="agileits-left">
                                        <input class="show__input" type="text" id="Username" name="owner" value="{{ auth()->user()->name }}" placeholder="{{ auth()->user()->name }}" required>
                                    </div>
                                    
                                    <div class="agileits-right">
                                        <input class="show__input" type="number" id="Numseats" name="total_seats" placeholder="Total seats" required min="1" max="10">
                                    </div>
                                </div>
                                <button class="show__btn" onclick="takeData()">Start Selecting</button> 

                                <ul class="seat_w3ls">
                                    <li class="smallBox greenBox">Selected Seat</li>
    
                                    <li class="smallBox redBox">Reserved Seat</li>
    
                                    <li class="smallBox emptyBox">Empty Seat</li>
                                </ul>

                                <div class="seatStructure txt-center" style="overflow-x:auto;">
                                    <p id="notification"></p>
                                        <table id="seatsBlock">
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td></td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                            </tr>

                                            @php 
                                                $alphabets = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
                                            @endphp
                                            @foreach($alphabets as $letter)
                                                <tr>
                                                    <td>
                                                        {{ $letter }}
                                                    </td>
                                                    @for($i = 1; $i < 13; $i++)
                                                        @php
                                                            $seatNumber = $letter . $i;
                                                        @endphp

                                                        @if(in_array($seatNumber, $takenSeatNumbers))
                                                            <td>
                                                                <div class="r-seats"></div>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <input type="checkbox" class="seats" value="{{ $letter  }}{{ $i }}" disabled="">
                                                            </td>
                                                        @endif
                                                        @if ( $i == 6) <td></td> @endif
                                                    @endfor
                                                </tr>
                                                @if ( $letter == 'E') <tr class="seatVGap"></tr> @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="screen">
                                        <h2 class="wthree">Screen this way</h2>
                                    </div>
                                </div>
                            </div>

                            <form id="seat__form" autocomplete="off" action="{{ url('/book/reserve/') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="owner" value="{{ auth()->user()->name }}"/>
                                <input type="hidden" name="total_seats" id="f_totalseats"/>
                                <input type="hidden" name="seats" id="seatsDisplay"/>
                                <input type="hidden" name="show_id" value="{{ $show->id }}"/>
                                <input type="hidden" name="show_movie_name" value="{{ $show->movie_name }}"/>
                                <input type="hidden" name="show_theatre_name" value="{{ $show->theatre_name }}"/>
                                <input type="hidden" name="show_date_time" value="{{ $show->date_time }}"/>
                                <input type="hidden" name="show_cinema" value="{{ $show->cinema }}"/>
                                <input type="hidden" name="show_price" value="{{ $show->price }}"/>
                            </form>
                            
                            <h4 id="price"></h4>

                            <button type="submit" class="show__btn" onclick="updateTextArea()">
                                Confirm Selection
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('master.scripts')

        <script>
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

        <!-- script for seat selection -->
        <script>
            function onLoaderFunc() {
                $(".seatStructure *").prop("disabled", true);
                $(".displayerBoxes *").prop("disabled", true);
            }
    
            function takeData() {
                if (($("#Username").val() <= 0) || ($("#Numseats").val() <= 0)) {
                    toastr.info('Make sure to fill first two fields');
                } else if ( $("#Numseats").val() > 10) {
                    toastr.info('Max seat limit is 10');
                } else {
                    $(".inputForm *").prop("disabled", true);
                    $(".seatStructure *").prop("disabled", false);

                    var price = {!! $show->price !!};
                    toastr.success('Select your seats now!');
                    document.getElementById('price').innerHTML = "Your total is: " + price * $("#Numseats").val() + "Rs";
                }
            }
    
            function updateTextArea() {
                if ($("input:checked").length == ($("#Numseats").val())) {
                    $(".seatStructure *").prop("disabled", true);
    
                    var allNameVals = [];
                    var allNumberVals = [];
                    var allSeatsVals = [];
    
                    // Storing in Array
                    allNameVals.push($("#Username").val());
                    allNumberVals.push($("#Numseats").val());
                    $('#seatsBlock :checked').each(function () {
                        allSeatsVals.push($(this).val());
                    });
    
                    // Displaying 
                    $('#f_totalseats').val(allNumberVals);
                    $('#seatsDisplay').val(allSeatsVals);

                    // Submit form
                    document.getElementById('seat__form').submit();
                } else {
                    toastr.info("Please select " + ($("#Numseats").val()) + " seats")
                }
            }
    
            $(":checkbox").click(function () {
                if ($("input:checked").length == ($("#Numseats").val())) {
                    $(":checkbox").prop('disabled', true);
                    $(':checked').prop('disabled', false);
                } else {
                    $(":checkbox").prop('disabled', false);
                }
            });
        </script>
        <!-- //script for seat selection -->    
    </body>
</html>
