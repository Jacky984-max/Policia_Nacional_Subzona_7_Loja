<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir Orden Trabajo</title>

    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  

    <link rel="stylesheet" href="{{ asset('new/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js",
                    "assets/js/demo.js"
                ],
                "build": ["assets/css/theme.css",
                    "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js",
                    "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css",
                    "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js",
                    "assets/js/hs.theme-appearance-charts.js",
                    "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js",
                    "assets/js/demo.js"
                ]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>

</head>

<body onload="window.print()">

    <div class="loader"></div>

    <div id="app">

        <div class="main-content">
            <!-- Main Content -->

            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-10 mb-5 mb-lg-0">
        
                        <div class="card card-lg mb-5">
                            <div class="card-body">
        
                                <!---INICIO--->
        
                                <div class="invoice-print">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="invoice-title">
                                                <h2>Orden de Trabajo</h2>
                                                <div class="invoice-number">#{{ $orden->id }}</div>
                                            </div>
                                            <hr>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <address>
                                                        <strong>Payment Method:</strong><br>
                                                        Visa ending **** 5687<br>
                                                        test@example.com
                                                    </address>
                                                </div>
                                                <div class="col-md-6 text-md-right">
                                                    <address>
                                                        <strong>Fecha:</strong><br>
                                                        {{ $orden->fecha_generacion }}<br><br>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="section-title">Ordenes de Trabajo</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-md">
                                                    <tr>
                                                        <th data-width="40">#</th>
                                                        <th>Detalle</th>
                                                        <th class="text-center">Precio</th>
                                                        <th class="text-center">Cantidad</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
        
                                                    <tr>
                                                        <td>2</td>
                                                        <td>{{ $orden->detalle_mantenimiento }}</td>
                                                        <td class="text-center">{{ $orden->subtotal }}</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                      </tr>
                                                   
                                                </table>
                                            </div>
                                            

                                           
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-md-right">
                                    <div class="float-lg-left mb-lg-0 mb-3">
                                        
                                    </div>
                                    <a href="{{ route('ordenes.imprimir', $orden->id)}}" class="btn btn-warning btn-icon icon-left" target="_blank" id="print-invoice-button"><i class="fas fa-print"></i>
                                        Imprimir</a>
                                </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                            </div>
                        </div>
        
                     
        
                    </div>
        
        
        
                </div>
            </div>
           







            @include('components.footer.footer')
        </div>


    </div>

 
    <!-- General JS Scripts -->
    <script src="{{ asset('new/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('new/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('new/assets/js/custom.js') }}"></script>

    <script>
        document.getElementById('print-invoice-button').addEventListener('click', function() {
            var orderId = "{{ $orden->id }}";
            var url = "{{ route('ordenes.imprimir', ':id') }}".replace(':id', orderId);
            window.open(url, '_blank');
        });
    </script>

</body>

</html>