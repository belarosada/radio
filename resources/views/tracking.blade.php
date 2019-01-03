@extends('layout.layout')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <section class="content">

        <div class="col-md-3">
            <select class="form-control" name="idradio" id="idradio">
                <option value="pilih" disabled selected>Pilih ID Radio</option>
                @foreach ($data as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <br/><br/>

        <div class="row">
            <div class="col-lg-12">
                <div id="map" style="height: 550px;"></div>
            </div>
        </div>

        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <section class="col-lg-5 connectedSortable"> </section>
            </section>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#idradio').select2();
        });
    </script>
    <script>
        const radius = 20;
        var map = L.map('map').setView([0.12108564376831, 117.47071266174], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.get("{{url('data')}}", function( data ) {
            data.data.forEach(function(val){
                if (val.coordinate) {
                    let coordinate = [parseFloat(val.coordinate.split(', ')[0]), parseFloat(val.coordinate.split(', ')[1])];
                    let option = {};
                    if (parseFloat(val.signal) < -100) {
                        option = {
                            color: '#ff0015',
                            fillColor: '#ff0015',
                            fillOpacity: 0.5
                        };
                    } else if (between(parseFloat(val.signal), -90, -100)) {
                        option = {
                            color: '#ff9000',
                            fillColor: '#ff9000',
                            fillOpacity: 0.5
                        };
                    } else if (between(parseFloat(val.signal), -80, -90)) {
                        option = {
                            color: '#fff200',
                            fillColor: '#fff200',
                            fillOpacity: 0.5
                        };
                    } else if (parseFloat(val.signal) > -80) {
                        option = {
                            color: '#00ff04',
                            fillColor: '#00ff04',
                            fillOpacity: 0.5
                        };
                    }
                    new L.circle(coordinate, {radius: radius})
                    .setStyle(option)
                    .bindTooltip(`signal: ${val.signal} id: ${val.id_pr}`)
                    .addTo(map);
                }
            });
        });
        function between(x, max, min) {
            return x >= min && x <= max;
        }
    </script>
@endpush
