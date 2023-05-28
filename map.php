<?php
include_once 'include/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Map - Himlayang Pilipino Memorial Park</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/home.css">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="stylesheet" href="/webmap/css/leaflet.css">
    <link rel="stylesheet" href="/webmap/css/qgis2web.css">
    <link rel="stylesheet" href="/webmap/css/L.Control.Locate.min.css">
    <link rel="stylesheet" href="/webmap/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/webmap/css/leaflet-control-geocoder.Geocoder.css">

    <style>
        #loading {
            position: static;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: transparent;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Himlayang Pilipino Memorial Park</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="map.php">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login/index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block">
            <div class="container">
                <div class="row mt-4 pl-3 text-sm">
                    <h6>Legend:</h6>
                    <div class="col-sm-6 d-flex flex-column">
                        <span><i class="fa fa-square text-vacant"></i> Vacant</span>
                        <span><i class="fa fa-square text-occupied1"></i> Unavailable</span>
                        <!-- <span><i class="fa fa-square text-occupied2"></i> Occupied by 2 person</span> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 mt-4 pt-2">
                        <div>
                            <div id="map" style="border: 1px solid black; width: 99%; height: 450px;">
                                <div id="loading">
                                    <img id="loading-image" class="mx-auto" src="assets/img/Preloader_3.gif" alt="Loading..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div>
            <p class="text-muted d-flex justify-content-center"><small>© 2022 Himlayang Pilipino Memorial Park</small></p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>


    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
    </script>

    <script src="/webmap/js/qgis2web_expressions.js"></script>
    <script src="/webmap/js/leaflet.js"></script>
    <script src="/webmap/js/L.Control.Locate.min.js"></script>
    <script src="/webmap/js/multi-style-layer.js"></script>
    <script src="/webmap/js/leaflet.rotatedMarker.js"></script>
    <script src="/webmap/js/leaflet.pattern.js"></script>
    <script src="/webmap/js/leaflet-hash.js"></script>
    <script src="/webmap/js/Autolinker.min.js"></script>
    <script src="/webmap/js/rbush.min.js"></script>
    <script src="/webmap/js/labelgun.min.js"></script>
    <script src="/webmap/js/labels.js"></script>
    <script src="/webmap/js/leaflet-control-geocoder.Geocoder.js"></script>
    <script src="/webmap/data/MapOutline_1.js"></script>
    <script src="/webmap/data/comfortRoom_2.js"></script>
    <script src="/webmap/data/road_3.js"></script>
    <script src="/webmap/data/UndevelopedPortion_4.js"></script>
    <script src="/webmap/data/DambanangAlala_5.js"></script>
    <script src="/webmap/data/FloranteatLaura_6.js"></script>
    <script src="/webmap/data/Lagoon_7.js"></script>
    <script src="/webmap/data/Chapel_8.js"></script>
    <script src="/webmap/data/AdministrationBLDG_9.js"></script>
    <script src="/webmap/data/Parking_10.js"></script>
    <script src="/webmap/data/MechanicalShop_11.js"></script>
    <script src="/webmap/data/Canteen_12.js"></script>
    <script src="/webmap/data/VaultFabricationArea_13.js"></script>
    <script src="/webmap/data/gravekeepsmain_14.js"></script>
    <script src="/webmap/data/Centroids_15.js"></script>
    <script>
        var map = L.map('map', {
            zoomControl: true,
            maxZoom: 20,
            minZoom: 17
        }).fitBounds([
            [14.679297208136026, 121.04682564488066],
            [14.68570287405546, 121.05677074665908]
        ]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({
            truncate: {
                length: 30,
                location: 'smart'
            }
        });
        L.control.locate({
            locateOptions: {
                maxZoom: 19
            }
        }).addTo(map);
        var bounds_group = new L.featureGroup([]);

        function setBounds() {}
        map.createPane('pane_Satellite_0');
        map.getPane('pane_Satellite_0').style.zIndex = 400;
        var layer_Satellite_0 = L.tileLayer('http://mt0.google.com/vt/lyrs=s&hl=en&x={x}&y={y}&z={z}', {
            pane: 'pane_Satellite_0',
            opacity: 1.0,
            attribution: '',
            minZoom: 17,
            maxZoom: 20,
            minNativeZoom: 0,
            maxNativeZoom: 18
        });
        layer_Satellite_0;
        map.addLayer(layer_Satellite_0);

        function pop_MapOutline_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Map</th>\
                        <td>' + (feature.properties['Map'] !== null ? autolinker.link(feature.properties['Map'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_MapOutline_1_0() {
            return {
                pane: 'pane_MapOutline_1',
                opacity: 1,
                color: 'rgba(154,154,154,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 4.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        map.createPane('pane_MapOutline_1');
        map.getPane('pane_MapOutline_1').style.zIndex = 401;
        map.getPane('pane_MapOutline_1').style['mix-blend-mode'] = 'normal';
        var layer_MapOutline_1 = new L.geoJson(json_MapOutline_1, {
            attribution: '',
            interactive: false,
            dataVar: 'json_MapOutline_1',
            layerName: 'layer_MapOutline_1',
            pane: 'pane_MapOutline_1',
            onEachFeature: pop_MapOutline_1,
            style: style_MapOutline_1_0,
        });
        bounds_group.addLayer(layer_MapOutline_1);
        map.addLayer(layer_MapOutline_1);

        function pop_comfortRoom_2(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">CRID</th>\
                        <td>' + (feature.properties['CRID'] !== null ? autolinker.link(feature.properties['CRID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_comfortRoom_2_0() {
            return {
                pane: 'pane_comfortRoom_2',
                opacity: 1,
                color: 'rgba(35,35,35,0.7)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(196,60,57,0.7)',
                interactive: false,
            }
        }
        map.createPane('pane_comfortRoom_2');
        map.getPane('pane_comfortRoom_2').style.zIndex = 402;
        map.getPane('pane_comfortRoom_2').style['mix-blend-mode'] = 'normal';
        var layer_comfortRoom_2 = new L.geoJson(json_comfortRoom_2, {
            attribution: '',
            interactive: false,
            dataVar: 'json_comfortRoom_2',
            layerName: 'layer_comfortRoom_2',
            pane: 'pane_comfortRoom_2',
            onEachFeature: pop_comfortRoom_2,
            style: style_comfortRoom_2_0,
        });
        bounds_group.addLayer(layer_comfortRoom_2);
        map.addLayer(layer_comfortRoom_2);

        function pop_road_3(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">roadname</th>\
                        <td>' + (feature.properties['roadname'] !== null ? autolinker.link(feature.properties['roadname'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_road_3_0() {
            return {
                pane: 'pane_road_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.65)',
                dashArray: '',
                lineCap: 'round',
                lineJoin: 'round',
                weight: 8.0,
                fillOpacity: 0,
                interactive: false,
            }
        }

        function style_road_3_1() {
            return {
                pane: 'pane_road_3',
                opacity: 1,
                color: 'rgba(255,96,17,0.65)',
                dashArray: '',
                lineCap: 'round',
                lineJoin: 'round',
                weight: 6.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        map.createPane('pane_road_3');
        map.getPane('pane_road_3').style.zIndex = 403;
        map.getPane('pane_road_3').style['mix-blend-mode'] = 'normal';
        var layer_road_3 = new L.geoJson.multiStyle(json_road_3, {
            attribution: '',
            interactive: false,
            dataVar: 'json_road_3',
            layerName: 'layer_road_3',
            pane: 'pane_road_3',
            onEachFeature: pop_road_3,
            styles: [style_road_3_0, style_road_3_1, ]
        });
        bounds_group.addLayer(layer_road_3);
        map.addLayer(layer_road_3);

        function pop_UndevelopedPortion_4(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_UndevelopedPortion_4_0() {
            return {
                pane: 'pane_UndevelopedPortion_4',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(1,118,157,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_UndevelopedPortion_4');
        map.getPane('pane_UndevelopedPortion_4').style.zIndex = 404;
        map.getPane('pane_UndevelopedPortion_4').style['mix-blend-mode'] = 'normal';
        var layer_UndevelopedPortion_4 = new L.geoJson(json_UndevelopedPortion_4, {
            attribution: '',
            interactive: false,
            dataVar: 'json_UndevelopedPortion_4',
            layerName: 'layer_UndevelopedPortion_4',
            pane: 'pane_UndevelopedPortion_4',
            onEachFeature: pop_UndevelopedPortion_4,
            style: style_UndevelopedPortion_4_0,
        });
        bounds_group.addLayer(layer_UndevelopedPortion_4);
        map.addLayer(layer_UndevelopedPortion_4);

        function pop_DambanangAlala_5(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Dambanaala</th>\
                        <td>' + (feature.properties['Dambanaala'] !== null ? autolinker.link(feature.properties['Dambanaala'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_DambanangAlala_5_0() {
            return {
                pane: 'pane_DambanangAlala_5',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(136,0,234,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_DambanangAlala_5');
        map.getPane('pane_DambanangAlala_5').style.zIndex = 405;
        map.getPane('pane_DambanangAlala_5').style['mix-blend-mode'] = 'normal';
        var layer_DambanangAlala_5 = new L.geoJson(json_DambanangAlala_5, {
            attribution: '',
            interactive: false,
            dataVar: 'json_DambanangAlala_5',
            layerName: 'layer_DambanangAlala_5',
            pane: 'pane_DambanangAlala_5',
            onEachFeature: pop_DambanangAlala_5,
            style: style_DambanangAlala_5_0,
        });
        bounds_group.addLayer(layer_DambanangAlala_5);
        map.addLayer(layer_DambanangAlala_5);

        function pop_FloranteatLaura_6(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_FloranteatLaura_6_0() {
            return {
                pane: 'pane_FloranteatLaura_6',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(223,229,54,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_FloranteatLaura_6');
        map.getPane('pane_FloranteatLaura_6').style.zIndex = 406;
        map.getPane('pane_FloranteatLaura_6').style['mix-blend-mode'] = 'normal';
        var layer_FloranteatLaura_6 = new L.geoJson(json_FloranteatLaura_6, {
            attribution: '',
            interactive: false,
            dataVar: 'json_FloranteatLaura_6',
            layerName: 'layer_FloranteatLaura_6',
            pane: 'pane_FloranteatLaura_6',
            onEachFeature: pop_FloranteatLaura_6,
            style: style_FloranteatLaura_6_0,
        });
        bounds_group.addLayer(layer_FloranteatLaura_6);
        map.addLayer(layer_FloranteatLaura_6);

        function pop_Lagoon_7(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_Lagoon_7_0() {
            return {
                pane: 'pane_Lagoon_7',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(229,182,54,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_Lagoon_7');
        map.getPane('pane_Lagoon_7').style.zIndex = 407;
        map.getPane('pane_Lagoon_7').style['mix-blend-mode'] = 'normal';
        var layer_Lagoon_7 = new L.geoJson(json_Lagoon_7, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Lagoon_7',
            layerName: 'layer_Lagoon_7',
            pane: 'pane_Lagoon_7',
            onEachFeature: pop_Lagoon_7,
            style: style_Lagoon_7_0,
        });
        bounds_group.addLayer(layer_Lagoon_7);
        map.addLayer(layer_Lagoon_7);

        function pop_Chapel_8(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_Chapel_8_0() {
            return {
                pane: 'pane_Chapel_8',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(232,113,141,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_Chapel_8');
        map.getPane('pane_Chapel_8').style.zIndex = 408;
        map.getPane('pane_Chapel_8').style['mix-blend-mode'] = 'normal';
        var layer_Chapel_8 = new L.geoJson(json_Chapel_8, {
            attribution: '',
            interactive:false,
            dataVar: 'json_Chapel_8',
            layerName: 'layer_Chapel_8',
            pane: 'pane_Chapel_8',
            onEachFeature: pop_Chapel_8,
            style: style_Chapel_8_0,
        });
        bounds_group.addLayer(layer_Chapel_8);
        map.addLayer(layer_Chapel_8);

        function pop_AdministrationBLDG_9(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_AdministrationBLDG_9_0() {
            return {
                pane: 'pane_AdministrationBLDG_9',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(213,180,60,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_AdministrationBLDG_9');
        map.getPane('pane_AdministrationBLDG_9').style.zIndex = 409;
        map.getPane('pane_AdministrationBLDG_9').style['mix-blend-mode'] = 'normal';
        var layer_AdministrationBLDG_9 = new L.geoJson(json_AdministrationBLDG_9, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AdministrationBLDG_9',
            layerName: 'layer_AdministrationBLDG_9',
            pane: 'pane_AdministrationBLDG_9',
            onEachFeature: pop_AdministrationBLDG_9,
            style: style_AdministrationBLDG_9_0,
        });
        bounds_group.addLayer(layer_AdministrationBLDG_9);
        map.addLayer(layer_AdministrationBLDG_9);

        function pop_Parking_10(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_Parking_10_0() {
            return {
                pane: 'pane_Parking_10',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(229,182,54,0.65)',
                interactive: false,
            }
        }
        map.createPane('pane_Parking_10');
        map.getPane('pane_Parking_10').style.zIndex = 410;
        map.getPane('pane_Parking_10').style['mix-blend-mode'] = 'normal';
        var layer_Parking_10 = new L.geoJson(json_Parking_10, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Parking_10',
            layerName: 'layer_Parking_10',
            pane: 'pane_Parking_10',
            onEachFeature: pop_Parking_10,
            style: style_Parking_10_0,
        });
        bounds_group.addLayer(layer_Parking_10);
        map.addLayer(layer_Parking_10);

        function pop_MechanicalShop_11(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_MechanicalShop_11_0() {
            return {
                pane: 'pane_MechanicalShop_11',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(145,82,45,0.65)',
                interactive: true,
            }
        }
        map.createPane('pane_MechanicalShop_11');
        map.getPane('pane_MechanicalShop_11').style.zIndex = 411;
        map.getPane('pane_MechanicalShop_11').style['mix-blend-mode'] = 'normal';
        var layer_MechanicalShop_11 = new L.geoJson(json_MechanicalShop_11, {
            attribution: '',
            interactive: true,
            dataVar: 'json_MechanicalShop_11',
            layerName: 'layer_MechanicalShop_11',
            pane: 'pane_MechanicalShop_11',
            onEachFeature: pop_MechanicalShop_11,
            style: style_MechanicalShop_11_0,
        });
        bounds_group.addLayer(layer_MechanicalShop_11);
        map.addLayer(layer_MechanicalShop_11);

        function pop_Canteen_12(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_Canteen_12_0() {
            return {
                pane: 'pane_Canteen_12',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(225,89,137,0.65)',
                interactive: true,
            }
        }
        map.createPane('pane_Canteen_12');
        map.getPane('pane_Canteen_12').style.zIndex = 412;
        map.getPane('pane_Canteen_12').style['mix-blend-mode'] = 'normal';
        var layer_Canteen_12 = new L.geoJson(json_Canteen_12, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Canteen_12',
            layerName: 'layer_Canteen_12',
            pane: 'pane_Canteen_12',
            onEachFeature: pop_Canteen_12,
            style: style_Canteen_12_0,
        });
        bounds_group.addLayer(layer_Canteen_12);
        map.addLayer(layer_Canteen_12);

        function pop_VaultFabricationArea_13(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Site Name</th>\
                        <td>' + (feature.properties['Site Name'] !== null ? autolinker.link(feature.properties['Site Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_VaultFabricationArea_13_0() {
            return {
                pane: 'pane_VaultFabricationArea_13',
                opacity: 1,
                color: 'rgba(35,35,35,0.65)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(183,72,75,0.65)',
                interactive: true,
            }
        }
        map.createPane('pane_VaultFabricationArea_13');
        map.getPane('pane_VaultFabricationArea_13').style.zIndex = 413;
        map.getPane('pane_VaultFabricationArea_13').style['mix-blend-mode'] = 'normal';
        var layer_VaultFabricationArea_13 = new L.geoJson(json_VaultFabricationArea_13, {
            attribution: '',
            interactive: true,
            dataVar: 'json_VaultFabricationArea_13',
            layerName: 'layer_VaultFabricationArea_13',
            pane: 'pane_VaultFabricationArea_13',
            onEachFeature: pop_VaultFabricationArea_13,
            style: style_VaultFabricationArea_13_0,
        });
        bounds_group.addLayer(layer_VaultFabricationArea_13);
        map.addLayer(layer_VaultFabricationArea_13);

        function pop_gravekeepsmain_14(feature, layer) {
            var popupContent = '<table class="popup-feature-map" data-sitename="' + feature.properties['SiteName'] + '">\
                    <tr>\
                        <th scope="row">SiteName</th>\
                        <td>' + (feature.properties['SiteName'] !== null ? autolinker.link(feature.properties['SiteName'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Name</th>\
                        <td>' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoB</th>\
                        <td>' + (feature.properties['DoB'] !== null ? autolinker.link(feature.properties['DoB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoD</th>\
                        <td>' + (feature.properties['DoD'] !== null ? autolinker.link(feature.properties['DoD'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LotAvail</th>\
                        <td>' + (feature.properties['LotAvail'] !== null ? autolinker.link(feature.properties['LotAvail'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">layer</th>\
                        <td>' + (feature.properties['layer'] !== null ? autolinker.link(feature.properties['layer'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_gravekeepsmain_14_0() {
            return {
                pane: 'pane_gravekeepsmain_14',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(23,161,65,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_gravekeepsmain_14');
        map.getPane('pane_gravekeepsmain_14').style.zIndex = 414;
        map.getPane('pane_gravekeepsmain_14').style['mix-blend-mode'] = 'normal';
        var layer_gravekeepsmain_14 = new L.geoJson(json_gravekeepsmain_14, {
            attribution: '',
            interactive: true,
            dataVar: 'json_gravekeepsmain_14',
            layerName: 'layer_gravekeepsmain_14',
            pane: 'pane_gravekeepsmain_14',
            onEachFeature: pop_gravekeepsmain_14,
            style: style_gravekeepsmain_14_0,
        });
        bounds_group.addLayer(layer_gravekeepsmain_14);
        map.addLayer(layer_gravekeepsmain_14);

        //asd
        function pop_Centroids_15(feature, layer) {
            var popupContent = function temp() {
                var label = feature.properties['SiteName'];


                var data = {};
                data.label = label;

                $.ajax({
                    url: "test.php",
                    method: "post",
                    data: data,
                    success: function(data) {
                        var json = JSON.parse(data);
                        feature.properties['Name'] = json.Name;
                        feature.properties['DoB'] = json.DoB;
                        feature.properties['DoD'] = json.DoD;
                        feature.properties['LotAvail'] = json.LotAvail;

                        console.log(feature.properties);
                        var content = '<table class="popup-feature-map" data-sitename="' + feature.properties['SiteName'] + '">\
                    <tr>\
                        <th scope="row">SiteName</th>\
                        <td>' + (feature.properties['SiteName'] !== null ? autolinker.link(feature.properties['SiteName'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Name</th>\
                        <td>' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoB</th>\
                        <td>' + (feature.properties['DoB'] !== null ? autolinker.link(feature.properties['DoB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoD</th>\
                        <td>' + (feature.properties['DoD'] !== null ? autolinker.link(feature.properties['DoD'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LotAvail</th>\
                        <td>' + (feature.properties['LotAvail'] !== null ? autolinker.link(feature.properties['LotAvail'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">layer</th>\
                        <td>' + (feature.properties['layer'] !== null ? autolinker.link(feature.properties['layer'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>'
                        layer.setPopupContent(content);
                    }
                })

                return '<table class="popup-feature-map" data-sitename="' + feature.properties['SiteName'] + '">\
                    <tr>\
                        <th scope="row">SiteName</th>\
                        <td>' + (feature.properties['SiteName'] !== null ? autolinker.link(feature.properties['SiteName'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Name</th>\
                        <td>' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : 'test') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoB</th>\
                        <td>' + (feature.properties['DoB'] !== null ? autolinker.link(feature.properties['DoB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DoD</th>\
                        <td>' + (feature.properties['DoD'] !== null ? autolinker.link(feature.properties['DoD'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LotAvail</th>\
                        <td>' + (feature.properties['LotAvail'] !== null ? autolinker.link(feature.properties['LotAvail'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">layer</th>\
                        <td>' + (feature.properties['layer'] !== null ? autolinker.link(feature.properties['layer'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            }

            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Centroids_15_0() {
            return {
                pane: 'pane_Centroids_15',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(22,255,1,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_Centroids_15');
        map.getPane('pane_Centroids_15').style.zIndex = 415;
        map.getPane('pane_Centroids_15').style['mix-blend-mode'] = 'normal';
        var layer_Centroids_15 = new L.geoJson(json_Centroids_15, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Centroids_15',
            layerName: 'layer_Centroids_15',
            pane: 'pane_Centroids_15',
            onEachFeature: pop_Centroids_15,
            pointToLayer: function(feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Centroids_15_0(feature));
            },
        });
        bounds_group.addLayer(layer_Centroids_15);
        map.addLayer(layer_Centroids_15);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .title += 'Search for a place';
        var baseMaps = {};
        L.control.layers(baseMaps, {
            '<img src="/webmap/legend/Centroids_15.png" /> Centroids': layer_Centroids_15,
            '<img src="/webmap/legend/gravekeepsmain_14.png" /> gravekeepsmain': layer_gravekeepsmain_14,
            '<img src="/webmap/legend/VaultFabricationArea_13.png" /> Vault Fabrication Area': layer_VaultFabricationArea_13,
            '<img src="/webmap/legend/Canteen_12.png" /> Canteen': layer_Canteen_12,
            '<img src="/webmap/legend/MechanicalShop_11.png" /> Mechanical Shop': layer_MechanicalShop_11,
            '<img src="/webmap/legend/Parking_10.png" /> Parking': layer_Parking_10,
            '<img src="/webmap/legend/AdministrationBLDG_9.png" /> Administration BLDG': layer_AdministrationBLDG_9,
            '<img src="/webmap/legend/Chapel_8.png" /> Chapel': layer_Chapel_8,
            '<img src="/webmap/legend/Lagoon_7.png" /> Lagoon': layer_Lagoon_7,
            '<img src="/webmap/legend/FloranteatLaura_6.png" /> Florante at Laura': layer_FloranteatLaura_6,
            '<img src="/webmap/legend/DambanangAlala_5.png" /> Dambana ng Alala': layer_DambanangAlala_5,
            '<img src="/webmap/legend/UndevelopedPortion_4.png" /> Undeveloped Portion': layer_UndevelopedPortion_4,
            '<img src="/webmap/legend/road_3.png" /> road': layer_road_3,
            '<img src="/webmap/legend/comfortRoom_2.png" /> comfort Room': layer_comfortRoom_2,
            '<img src="/webmap/legend/MapOutline_1.png" /> Map Outline': layer_MapOutline_1,
            "Satellite": layer_Satellite_0,
        }).addTo(map);
        setBounds();
        resetLabels([layer_comfortRoom_2, layer_road_3, layer_UndevelopedPortion_4, layer_DambanangAlala_5]);
        map.on("zoomend", function() {
            resetLabels([layer_comfortRoom_2, layer_road_3, layer_UndevelopedPortion_4, layer_DambanangAlala_5]);
        });
        map.on("layeradd", function() {
            resetLabels([layer_comfortRoom_2, layer_road_3, layer_UndevelopedPortion_4, layer_DambanangAlala_5]);
        });
        map.on("layerremove", function() {
            resetLabels([layer_comfortRoom_2, layer_road_3, layer_UndevelopedPortion_4, layer_DambanangAlala_5]);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Listen to visibility changes in all ".popup-feature-map"s
            var popupFeatureMapElements = document.getElementsByClassName('leaflet-interactive');
    
            // for each map element...
            for (let popup in popupFeatureMapElements) {
                // ...listen to any changes in visibility
                popup.addEventListener('onclick', function() {
                    // if the map is visible...
                    if (popup.isVisible()) {
                        // (debug) send a popup with its data-sitename attr
                        alert('clicked')
                    }
                });
            }
        })
    </script>
</body>
</html>