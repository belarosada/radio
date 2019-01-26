@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="col-lg-3 col-xs-6">

        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{$allradio}}</h3>

                    <p>Radio Active</p>
                </div>
                <div class="icon">
                    <i class="ion ion-radio-waves"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$radio}}</h3>

                    <p>GPS Active</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('assets/images/photo1.jpg')}}" alt="Los Angeles" style="width:100%;" align="middle">
                    </div>

                    <div class="item">
                        <img src="{{asset('assets/images/photo2.jpg')}}" alt="Chicago" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="{{asset('assets/images/photo3.jpg')}}" alt="New york" style="width:100%;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


    </section>


@endsection
@push('scripts')
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
@endpush
