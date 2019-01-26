@extends('layout.layout')
@section('content')
    <section class="content-header">
        <h1>
            User Density
        </h1>
    </section>

    <section class="content">

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
    <script>
        var map;
        const config = {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            // if scaleRadius is false it will be the constant radius used in pixels
            "radius": 6,
            "maxOpacity": .8,
            // scales the radius based on map zoom
            "scaleRadius": false,
            // if set to false the heatmap uses the global maximum for colorization
            // if activated: uses the data maximum within the current map boundaries
            //   (there will always be a red spot with useLocalExtremas true)
            "useLocalExtrema": true,
            // which field name in your data represents the latitude - default "lat"
            latField: 'lat',
            // which field name in your data represents the longitude - default "lng"
            lngField: 'lng',
            // which field name in your data represents the data value - default "value"
            valueField: 'signal'
        }
        $(document).ready(function() {
            var heatmapLayer = new HeatmapOverlay(config);
            map = L.map('map').setView([0.12108564376831, 117.47071266174], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            map.addLayer(heatmapLayer);
            $.ajax({
                type    : "get",
                url     : "{{url('data')}}",
                data: {
                    'process': true,
                    '_token' : '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(data) {
                    heatmapLayer.setData(data);
                }
            });
        })
    </script>
@endpush
