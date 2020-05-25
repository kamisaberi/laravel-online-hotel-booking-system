<script>
    var locs = @json($map_locations);
    var map_info = @json($map);
    mapboxgl.accessToken = '{{$map->access_token}}';
    //        mapboxgl.accessToken = 'pk.eyJ1IjoiaG90ZWwtc2Fib3VyaSIsImEiOiJjanRiZXEzaTUwa3g3NDRudWRtYTVuanJoIn0.HzwDmQ5qSzX9Pm8-BCWz8w';
    mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.0/mapbox-gl-rtl-text.js');
    var markers = [];
    var geojson = {
        type: 'FeatureCollection',
        features: []
    };

    var starts = [];
    var ends = [];
    // if (locs.length > 0)
    //     var start = [locs[0].properties.lng.title, locs[0].properties.lat.title];

    for (var i = 0; i < locs.length; i++) {
        var loc = locs[i];

        if (loc.properties['base-location'].value == 1) {
            starts.push([loc.properties.lng.value, loc.properties.lat.value]);
        } else {
            ends.push([loc.properties.lng.value, loc.properties.lat.value]);
        }

        var j_loc = {
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [loc.properties.lng.value, loc.properties.lat.value]
            },
            properties: {
                title: loc.properties.title.value,
                description: loc.properties.description.value
            }
        };
        geojson.features.push(j_loc);

    }

    var map = new mapboxgl.Map({
        container: 'map',
//            style: 'mapbox://styles/mapbox/light-v9',
        style: 'mapbox://styles/mapbox/streets-v10',
// style: 'mapbox://styles/mapbox/outdoors-v11',
        center: [49.605069, 37.276716],
        zoom: 15
    });

    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    var canvas = map.getCanvasContainer();
    geojson.features.forEach(function (marker) {
        var el = document.createElement('div');
        el.className = 'marker-green';
        var marker = new mapboxgl.Marker(el, {
            offset: [0, -25]
        }).setLngLat(marker.geometry.coordinates)
            .setPopup(new mapboxgl.Popup({offset: 25})
                .setHTML('<h5>' + marker.properties.title + '</h5><p>' + marker.properties.description + '</p>'))
            .addTo(map);
        markers.push(marker);
    });

    // create a function to make a directions request
    function getRoute(start, end) {

        var url = 'https://api.mapbox.com/directions/v5/mapbox/cycling/' + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

// make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
        var req = new XMLHttpRequest();
        req.responseType = 'json';
        req.open('GET', url, true);
        req.onload = function () {
            var data = req.response.routes[0];
            var route = data.geometry.coordinates;
            var geojson = {
                type: 'Feature',
                properties: {},
                geometry: {
                    type: 'LineString',
                    coordinates: route
                }
            };
            console.log(geojson.geometry.coordinates);
// if the route already exists on the map, reset it using setData
            if (map.getSource('route')) {

                map.getSource('route').setData(geojson);
            } else { // otherwise, make a new request

                map.addLayer({
                    id: 'route' + start[0] + '_' + start[1] + "-" + end[0] + '_' + end[1],
                    type: 'line',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'Feature',
                            properties: {},
                            geometry: {
                                type: 'LineString',
                                coordinates: geojson.geometry.coordinates
                            }
                        }
                    },
                    layout: {
                        'line-join': 'round',
                        'line-cap': 'round'
                    },
                    paint: {
                        'line-color': '#3887be',
                        'line-width': 5,
                        'line-opacity': 0.75
                    }
                });


            }
// add turn instructions here at the end
        };
        req.send();
    }


    map.on('load', function () {

        if (map_info['draw-directions'].value == 1) {

            for (i = 0; i < starts.length; i++)
                for (j = 0; j < ends.length; j++)
                    getRoute(starts[i], ends[j]);

            for (i = 0; i < starts.length; i++) {
                map.addLayer({
                    id: 'start_point' + starts[i][0] + '_' + starts[i][1],
                    type: 'circle',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'FeatureCollection',
                            features: [
                                {
                                    type: 'Feature',
                                    properties: {},
                                    geometry: {
                                        type: 'Point',
                                        coordinates: starts[i]
                                    }
                                }
                            ]
                        }
                    },
                    paint: {
                        'circle-radius': 10,
                        'circle-color': '#3887be'
                    }
                });
            }

            for (i = 0; i < ends.length; i++) {
                map.addLayer({
                    id: 'end_point' + ends[i][0] + '_' + ends[i][1],
                    type: 'circle',
                    source: {
                        type: 'geojson',
                        data: {
                            type: 'FeatureCollection',
                            features: [
                                {
                                    type: 'Feature',
                                    properties: {},
                                    geometry: {
                                        type: 'Point',
                                        coordinates: ends[i]
                                    }
                                }
                            ]
                        }
                    },
                    paint: {
                        'circle-radius': 10,
                        'circle-color': '#3887be'
                    }
                });
            }

        }
    });


    /*TODO ADD MARKER USING TOUCH
    map.on('click', addMarker);
    function addMarker(e) {
    var el = document.createElement('div');
    el.className = 'marker-green';
    var marker = new mapboxgl.Marker(el, {
    offset: [0, -25]
    })
    .setLngLat([e.lngLat.lng, e.lngLat.lat])
    .addTo(map);

    geojson.features.push({
    type: 'Feature',
    geometry: {
    type: 'Point',
    coordinates: [e.lngLat.lng, e.lngLat.lat]
    },
    properties: {
    title: 'Mapbox',
    description: 'San Francisco, California'
    }
    });
    markers.push(marker);
    }
    */

</script>
