<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="dist/favicon.png">
    <link rel="stylesheet" type="text/css" href="dist/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/custombutton/custombutton.css">
    <!-- <link href="dist/bootstrap/bootstrap-icons.min.css" rel="stylesheet" > -->
    <script type="text/javascript" src="dist/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <style>
      #bgimg{
        width:1920px;
        height:1080px;
        background-size:1920px;
        background-color:#000;
        background-image:url('dist/semarang_port_mapv3_efx.min.jpg');
        background-repeat:no-repeat;
        -webkit-transition:all 5s linear;
        -moz-transition:all 5s linear;
        transition:all 5s linear;
        /*-moz-transition-property:all;
        -moz-transition-duration:9s;
        -moz-transition-timing-function:linear;*/
      }

      .cardpump{
        text-shadow:0 0 5px black;box-shadow:-2px 2px 5px black;
        background:rgba(0,0,0,0);cursor:pointer; /*initiate transparent value*/
      }
      .cardheadbody{background:rgba(5,116,190,0.6);color:#ddd;} /*bg & text color of card*/

      .iconhead{width:23px;} /*width & spacing icon png in table card */
      .iconhead img{width:20px;} /*width the icon png img */

      .iconbody{width:40px;} /*width & spacing icon png in table card */
      .iconbody img{width:34px;} /*width the icon png img */

      .water-usonic{
        width:100%;bottom:0px;border-radius:0px 0px 13px 13px;
        transition:all 1s linear;
      }

      .gaug{display:none;}  /*initialize hidden gauge svg */
      .gaug div{width:auto;height:auto;color:white;} /*dimension gauge svg */

      .hovr:hover .gaug{
        display:inline;
      }
      .hovr:hover{background:#2d5463;z-index:99;}  /*hover bg color*/

      .sidemenu-child{display:none;}
      .sidemenu-head{border-radius:13px 0px 0px 13px;}
      .sidemenu:hover .sidemenu-head{border-radius:13px 0px 0px 0px;}/* :hover      */
      .sidemenu:hover .sidemenu-child{display:inline;width:280px;}/*      */


      .icoani{animation:icoframe 5s linear infinite;} /*animation icon sidemenu*/
      @keyframes icoframe {
        0%  {color:white; transform: rotate(0deg);}
        50% {color:black; transform: rotate(180deg);}
        100%{color:white; transform: rotate(360deg);}
      }

      .nameLabel{background:rgba(255,255,255,0.8);}

      .custom-tooltip{
        --bs-tooltip-bg:#123;
/*        --bs-tooltip-color: #333;*/
      }

      polyline{fill:none;stroke:white;stroke-width:3;} /*svg lines stroke*/
      .bggradien{background:linear-gradient(to right, rgba(13,110,253,0.9), rgba(85,183,227,0.9));}/*rgba(14,115,185,1)*/

    </style>
  </head>
  <body>
  <!-- ***************** start navbar | offcanvas container ***************** -->
  <!-- <nav class="navbar bggradien">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-semibold" style="" href="#"></a> 
      <div class="d-flex justify-content-end align-items-center text-light ">
        <div class="ms-2 me-2 fw-semibold" style="color:whitesmoke;text-shadow:0px 0px 7px black;">Map Mode
          <div class="btn-group" role="group" style="">
            

            <input type="radio" class="btn-check" name="btnradio" id="btnday" onclick="sunmode('rise')">
            <label class="btn btn-outline-dark" for="btnday" style="line-height:0.5;">
              <svg xmlns="" width="21" height="21" fill="currentColor" class="bi bi-sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
              </svg>
            </label>

            
            <input type="radio" class="btn-check" name="btnradio" id="btnauto" checked onclick="intervalWeather()" onload="intervalWeather()">
            <label class="btn btn-outline-dark" for="btnauto" style="line-height:0.5;">
              <svg xmlns="" width="21" height="21" fill="currentColor" class="bi bi-circle-half" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16"/>
              </svg>
            </label>

            
            <input type="radio" class="btn-check" name="btnradio" id="btnnight" onclick="sunmode('set')">
            <label class="btn btn-outline-dark" for="btnnight" style="line-height:0.5;">
              <svg xmlns="" width="21" height="21" fill="currentColor" class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
              </svg>
            </label>
          </div>
        </div>
        <div class="ms-2 me-2 vr"></div>
        <button class="navbar-toggler ms-2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="background:rgba(173,216,230,0.9);">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-2">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </nav> -->
  <!-- ***************** end navbar container ***************** -->


    <!-- ***************** start web content container ***************** -->
    <div class="container-fluid" id="bgimg"><!-- ***************** MAP IMAGE ***************** -->

      <div class="position-relative" >
        
        <!-- ***************** JAM & CUACA & PASUT ***************** -->
        <div class="position-absolute row fw-bolder fs-5" style="left:15px;top:15px;color:LightGray;text-shadow:0px 0px 7px black;width:700px;">
          <div class="col" >
            <div class="row row-cols-1">
              <div class="col fs-3" style="width:auto;line-height:1;">Tanjung Emas Semarang</div>
              <div class="col" id="datetime" style="width:auto;"></div>
            </div>
            <div class="row row-cols-2 " style="line-height:4;">
              <div class="col-2" id="airpasut">
                <svg xmlns="" width="50" height="50" fill="currentColor" viewBox="0 0 16 16" style="transition:all 2s linear;">
                  <path d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65"/>
                </svg>
              </div>
              <div class="col fs-6" id="sensorpasut" style="width:auto;letter-spacing:2px;">MLWS</div>
            </div>
          </div>
          <div class="col ">
            <img src="dist/weather/animated/day/800.svg" style="width:65px;line-height:1;" id="iconWeather">
            <!-- <div class="fs-6" style="line-height: 0.6;" id="cuaca"></div> -->
          </div>
          <!-- Force next columns to break to new line
          <div class="w-100"></div> -->
        </div>
        <!-- ***************** PASUT RIGHT SIDE CARD ***************** -->
        <div id="pasutcard" class="card position-absolute border-light border-2 rounded-4 fs-6 text-light" style="width:auto;left:1555px;top:100px;background:rgba(168, 168, 168, 0.6);transition:all 1s ease;">
            <div class="d-flex align-items-center text-center fw-semibold">
              <div class="p-2"><img id="iconpasutcard" src="dist/svg/wifi-off.svg" style="width:40px; height:40px;"></div>
              <div class="p-2">
                <div id="statuspasutcard">OFFLINE</div>
                <div>
                  Tinggi Gelombang <span id="sensorpasutcard">0 MLWS</span>
                </div>
              </div>
            </div>
        </div>

        <!-- ***************** LOGO ***************** -->
        <div class="position-absolute" style="left:1555px;top:15px;">
            <img src="dist/logo_pelindo.png" id="logo" style="height:65px;transition:all 5s linear; ">
        </div>
        
        <div class="row position-absolute fw-bolder" style="left:15px;top:150px;color:LightGray;text-shadow:0px 0px 7px black;">            
          <div class="col">
            <!-- <img src="" style="width:70px;" id="iconWeather"> -->
            <!-- <div class="col display-3" style="line-height: 0.7;" id="suhu"></div> -->
            <!-- <div class="col fs-5" style="line-height: 2.1;" id="cuaca"></div> -->
          </div>
        </div>
      </div>  <!-- end of relative position PART_1 -->
      

      <div class="position-relative">
        <div class="" id="mainwidget" style="transition:visibility .5s linear,opacity .5s linear;">
          <!-- _________________ CARD of KBB 1 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:300px;top:200px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>KBB 1</td>
                  <td class="text-end iconhead"><img src="" id="kbb1_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="kbb1_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb1_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb1_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb1_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="kbb1_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="kbb1_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="kbb1_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="kbb1_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="kbb1_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="kbb1_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours M1 (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of KBB 2 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:100px;top:390px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>KBB 2</td>
                  <td class="text-end iconhead"><img src="" id="kbb2_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="kbb2_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb2_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb2_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb2_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="kbb2_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="kbb2_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-sm-auto gaug" style="font-size:13px;">
                <div id="kbb2_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="kbb2_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="kbb2_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="kbb2_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of KBB 3 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:25px;top:550px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>KBB 3</td>
                  <td class="text-end iconhead"><img src="" id="kbb3_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="kbb3_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb3_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb3_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kbb3_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="kbb3_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="kbb3_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="kbb3_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="kbb3_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="kbb3_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="kbb3_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of KBT KEPANDUAN _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:440px;top:495px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>KEPANDUAN</td>
                  <td class="text-end iconhead"><img src="" id="kepanduan_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="kepanduan_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kepanduan_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kepanduan_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kepanduan_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="kepanduan_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="kepanduan_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="kepanduan_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="kepanduan_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="kepanduan_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="kepanduan_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of AMPENAN _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:440px;top:635px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>AMPENAN</td>
                  <td class="text-end iconhead"><img src="" id="ampenan_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="ampenan_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="ampenan_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="ampenan_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="ampenan_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="ampenan_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="ampenan_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="ampenan_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="ampenan_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="ampenan_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="ampenan_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of DELI _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:440px;top:350px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>DELI</td>
                  <td class="text-end iconhead"><img src="" id="deli_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="deli_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="deli_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="deli_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="deli_3"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="deli_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td><td>P3</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="deli_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="deli_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="deli_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="deli_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="deli_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of CLUSTER 3 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:850px;top:600px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>CLUSTER 3</td>
                  <td class="text-end iconhead"><img src="" id="cluster3_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="cluster3_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster3_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster3_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster3_3"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="cluster3_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td><td>P3</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="cluster3_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="cluster3_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="cluster3_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="cluster3_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="cluster3_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of Term.PENUMPANG _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:600px;top:130px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>Term.PENUMPANG</td>
                  <td class="text-end iconhead"><img src="" id="tp_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="tp_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="tp_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="tp_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="tp_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="tp_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="tp_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="tp_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="tp_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="tp_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="tp_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of KANTOR _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1250px;top:355px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>KANTOR</td>
                  <td class="text-end iconhead"><img src="" id="kantor_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="kantor_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kantor_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kantor_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="kantor_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="kantor_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="kantor_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="kantor_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="kantor_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="kantor_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="kantor_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of BEST  _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1100px;top:600px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>BEST</td>
                  <td class="text-end iconhead"><img src="" id="best_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="best_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="best_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="best_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="best_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="best_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="best_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="best_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="best_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="best_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="best_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of RTK TIMUR _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1685px;top:765px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>RTK TIMUR</td>
                  <td class="text-end iconhead"><img src="" id="rtktimur_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="rtktimur_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="rtktimur_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="rtktimur_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="rtktimur_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="rtktimur_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="rtktimur_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="rtktimur_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="rtktimur_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="rtktimur_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="rtktimur_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of PRASASTI _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:825px;top:40px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>PRASASTI</td>
                  <td class="text-end iconhead"><img src="" id="pras_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="pras_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="pras_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="pras_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="pras_3"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="pras_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td><td>P3</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="pras_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# d-flex flex-row   p-1 align-self-stretch text-center -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="pras_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="pras_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="pras_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="pras_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of CY 1 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1250px;top:40px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>CY 1</td>
                  <td class="text-end iconhead"><img src="" id="cy1_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="cy1_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy1_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy1_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy1_3"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="cy1_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td><td>P3</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="cy1_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="cy1_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="cy1_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="cy1_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="cy1_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of CY 2 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1250px;top:192px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>CY 2</td>
                  <td class="text-end iconhead"><img src="" id="cy2_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="cy2_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy2_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy2_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy2_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="cy2_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="cy2_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="cy2_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="cy2_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="cy2_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="cy2_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of CY 4 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1435px;top:355px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr  ><td>CY 4</td>
                  <td class="text-end iconhead"><img src="" id="cy4_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="cy4_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy4_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy4_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cy4_3" style="visibility:hidden;"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="cy4_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="cy4_usonic" ></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# -->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="cy4_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="cy4_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="cy4_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="cy4_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________ CARD of CLUSTER 2 _________________ -->
          <div class="card position-absolute border-light border-2 rounded-4 cardpump hovr" style="width:auto;left:1600px;top:192px;">
            <!-- #CARD HEAD# -->
            <div class="card cardheadbody" style="border-radius:13px 13px 0px 0px;">
              <table class="mb-1 ms-2 me-1 fw-bold z-3">
                <tr><td>CLUSTER 2</td>
                  <td class="text-end iconhead"><img src="" id="cluster2_pln"></td><!-- $id -->
                  <td class="text-end iconhead"><img src="dist/no-SIGNAL-ICON.png" id="cluster2_conn"></td><!-- $id -->
                </tr>
              </table>
            </div>
            <!-- #CARD BODY# -->
            <div class="card cardheadbody" style="border-radius:0px 0px 13px 13px;font-size:0.8em;">
              <div class="text-center fw-bold font-monospace ms-1 z-3"><table>
                <tr>
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster2_1"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster2_2"></td><!-- $id -->
                  <td class="iconbody"><img src="dist/pump_broken.png" id="cluster2_3"></td><!-- $id -->
                  <td rowspan="2" width="55px" class="text-end" id="cluster2_usonic_tx">0cm</td><!-- $id -->
                </tr>
                <tr><td>P1</td><td>P2</td><td>P3</td></tr>
              </table>
              </div>
              <div class="position-absolute water-usonic" id="cluster2_usonic"></div><!-- $id -->
            </div>
            <!-- #CARD HOVER# width:60px; height:50px;-->
            <div class="row justify-content-md-center">
              <div class="col-md-auto gaug" style="font-size:13px;">
                <div id="cluster2_gage_1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Apparent Power (kVA)">0 kVA</div><!-- $id -->
                <div id="cluster2_gage_2"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Voltage (V)">0 V</div><!-- $id -->
                <div id="cluster2_gage_3"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Current (A)">0 A</div><!-- $id -->
                <div id="cluster2_gage_4"   data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="Run Hours (Hours)">0 Hrs</div><!-- $id -->
              </div>
            </div>
          </div>

          <!-- _________________LINE POINT of CARD WIDGET_________________ -->
          <svg height="1060" width="1900">
            <filter id="shadow">
              <feDropShadow dx="-3" dy="3" stdDeviation="1" flood-opacity="0.7"/>
            </filter>

            <!-- #_KBB 1_# -->
            <polyline points="555,285 524,234 442,234" filter="url(#shadow)"/>
            <circle r="5" cx="555" cy="285" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>

            <!-- #_KBB 2_# -->
            <polyline points="308,434 300,424 242,424" filter="url(#shadow)"/>
            <circle r="5" cx="308" cy="434" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>

            <!-- #_KBB 3_# -->
             <polyline points="6,705 93,705 93,638" filter="url(#shadow)"/>
            <circle r="5" cx="6" cy="705" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_KBT KEPANDUAN_# -->
             <polyline points="397,425 397,530 441,530" filter="url(#shadow)"/>
            <circle r="5" cx="397" cy="425" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_AMPENAN_# -->
             <polyline points="257,652 265,670 441,670" filter="url(#shadow)"/>
            <circle r="5" cx="257" cy="652" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_DELI_# -->
            <polyline points="608,304 575,304 530,351" filter="url(#shadow)"/>
            <circle r="5" cx="608" cy="304" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_CLUSTER 3_# -->
            <polyline points="781,734 795,635 851,635" filter="url(#shadow)"/>
            <circle r="5" cx="781" cy="734" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_Term.PENUMPANG_# -->
            <polyline points="958,283 841,165 808,165" filter="url(#shadow)"/>
            <circle r="5" cx="958" cy="283" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_KANTOR_# -->
            <polyline points="1193,371 1201,390 1251,390 " filter="url(#shadow)"/>
            <circle r="5" cx="1193" cy="371" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_BEST_# -->
            <polyline points="1150,497 1175,523 1175,601" filter="url(#shadow)"/>
            <circle r="5" cx="1150" cy="497" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_RTK TIMUR_# -->
            <polyline points="1871,982 1758,982 1758,853" filter="url(#shadow)"/>
            <circle r="5" cx="1871" cy="982" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.3s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_PRASASTI_# -->
            <polyline points="1055,185 1041,75 1007,75" filter="url(#shadow)"/>
            <circle r="5" cx="1055" cy="185" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.5s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_CY 1_# -->
            <polyline points="1116,141 1170,75 1251,75" filter="url(#shadow)"/>
            <circle r="5" cx="1116" cy="141" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.5s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_CY 2_# -->
            <polyline points="1170,210 1180,227 1251,227" filter="url(#shadow)"/>
            <circle r="5" cx="1170" cy="210" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.5s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_CY 4_# -->
            <polyline points="1211,313 1385,313 1440,360 " filter="url(#shadow)"/>
            <circle r="5" cx="1211" cy="313" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.5s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            <!-- #_CLUSTER 2_# -->
            <polyline points="1433,275 1484,227 1601,227 " filter="url(#shadow)"/>
            <circle r="5" cx="1433" cy="275" stroke="black" fill="#5ac000"><animate attributeName="r" begin="0.5s" dur="2s" from="2" to="7" repeatCount="indefinite"/></circle>
            
            Update browser anda ke versi terbaru !! Update your browser to the latest version to see the magical content !!
          </svg>
        </div><!-- end of MainWidget -->
        <div class="" id="labelname" style="transition:visibility .5s linear,opacity .5s linear;">
          <!-- _________________ CARD Name Samudera _________________ -->
          <div class="card position-absolute border-light border-1 rounded-2 fst-italic fw-semibold p-1 nameLabel" style="width:auto;left:935px;top:220px;">
            D.Samudera
          </div>
          <!-- _________________ CARD Name Nusantara _________________ -->
          <div class="card position-absolute border-light border-1 rounded-2 fst-italic fw-semibold p-1 nameLabel" style="width:auto;left:900px;top:345px;">
            D.Nusantara
          </div>
          <!-- _________________ CARD Name TPKS _________________ -->
          <div class="card position-absolute border-light border-1 rounded-2 fst-italic fw-semibold p-1 nameLabel" style="width:auto;left:1120px;top:165px;">
            TPKS
          </div>
          <!-- _________________ CARD Name Kantor TjEmas _________________ -->
          <div class="card position-absolute border-light border-1 rounded-2 fst-italic fw-semibold p-1 text-center nameLabel" style="width:8em;left:1055px;top:360px;">
            Kantor Reg.3 Pelindo Tj.Emas
          </div>
        </div><!-- end of LabelName -->
      </div>  <!-- end of relative position PART_2 -->
    
    
        
      
    </div>                  <!-- ***************** end of web content container ***************** -->



<!-- ***************************************** SUMMARY Accordion ***** -->
      <div class="accordion accordion-flush position-fixed bottom-0 start-0 end-0" id="deviceSummary" style="z-index:1070;">
        <div class="accordion-item" style="background:rgba(0,0,0,0);">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bolder fs-2 bggradien" data-bs-toggle="collapse" data-bs-target="#contentSummary" aria-expanded="false" style="color:whitesmoke;line-height:0.6;letter-spacing:5px;">Summary</button>
            <!-- background:rgba(13,110,253,0.9); -->
          </h2>
          <div class="accordion-collapse collapse" id="contentSummary" data-bs-parent="#deviceSummary" style=" background:linear-gradient(to right,rgba(0,191,255,0.9),rgba(221,255,255,0.9));"><!-- rgba(173,216,230,0.9) -->
            <div class="accordion-body">
              <div class="d-flex flex-row">
                <div class="p-1 align-self-stretch text-center">
                  <div class="fw-semibold">Pompa Idle</div><img src="dist/Pump_idle_summary_icon.png" width="40px">
                  <hr>
                  <div class="fw-semibold">Pompa On</div><img src="dist/Pump_run_summary_icon.png" width="40px">
                </div>
                <div class="vr ms-1 me-1" style="width:2px;"></div>
                <div class="p-1 align-self-stretch text-center">
                  <div class="fw-semibold">Pompa Warning</div><img src="dist/Pump_warning_summary_icon.png" width="40px">
                  <hr>
                  <div class="fw-semibold">Pompa Maintenance</div><img src="dist/Pump_maintenance_summary_icon.png" width="40px">
                </div>
                <div class="vr ms-1 me-1 " style="width:2px;"></div>
                <div class="p-1 align-self-stretch text-center">
                  <img src="dist/weather/animated/day/800.svg" style="width:70px;" id="iconSummary">
                  <div class="col display-6" style="line-height: 0.7;" id="suhuSummary">°C</div>
                </div>
                <div class="vr ms-1 me-1" style="width:2px;"></div>
                <div class="p-1 align-self-stretch text-center">
                  <div class="fw-semibold">TINGGI GELOMBANG<br>PASUT PELINDO</div>
                  <div class="fw-semibold font-monospace" id="sensorpasutsummary" style="width:auto;">MLWS</div>
                  <div class="fw-semibold font-monospace" id="statuspasutsummary" style="width:auto;"><span>Offline</span></div>
                </div>
                <div class="vr ms-1 me-1" style="width:2px;"></div>
                <div class="p-1 align-self-stretch text-center">
                  <div class="fw-semibold">NOTIFIKASI</div>
                </div>
              </div>

              <!-- <table class="fw-bolder" width="100%">
                <tr>
                  <td></td>
                  <td colspan="4" class="fs-4 text-center align-middle">STATISTIK POMPA</td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td><img src="dist/pompa_STANDBY.png" style="height:130px;"></td>
                  <td><img src="dist/POMPA_ON_ANIMATION.gif" style="height:130px;"></td>
                  <td><img src="dist/pompa_warning.png" style="height:130px;"></td>
                  <td><img src="dist/pompa_rusak.png" style="height:130px;"></td>
                </tr>
              </table> -->

            </div>
          </div>
        </div>
      </div>


<!-- ***************************************** Mini Side Menu ***** -->
      <div class="card border-0 sidemenu position-fixed" style="right:1px;top:45%;z-index:100;background:rgba(0,0,0,0);text-shadow:0px 0px 7px black;transition:all 2s;">
        
        <div class="card p-2 fw-bolder sidemenu-head bggradien" style="color:whitesmoke;">
          <table>
            <tr>
              <!-- animated GEAR -->
              <td class=""><svg xmlns="" width="31" height="31" fill="currentColor" class="bi bi-gear-fill icoani" viewBox="0 0 16 16">
              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
              </svg></td>
              <td class="sidemenu-child fs-5">Menu Settings</td>
            </tr>
          </table>
        </div>

        <div class="card ps-2 pb-2 fw-semibold sidemenu-child bggradien" style="color:whitesmoke;border-radius:0px 0px 0px 13px;">
                <div class="">
                  <u>Map Menu</u>
                  <table class="text-center " style="width:100%;">
                    <tr>
                      <td>
                        <label class="cssbutton">
                          <input type="radio" name="mapmode" onclick="sunmode('zone')">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                      <td>
                        <label class="cssbutton">
                          <input type="checkbox" name="labeling" id="widget" checked onclick="showcard('mainwidget')">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                      <td>
                        <label class="cssbutton">
                          <input type="checkbox" name="labeling" id="label" checked onclick="showcard('labelname')">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                    </tr>
                    <tr style="line-height:0.6;">
                      <td><svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                        </svg> Zonasi</td>
                      <td><svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z"/>
                        </svg> Widget</td>
                      <td><svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043z"/>
                        </svg> Label</td>
                    </tr>
                  </table>
                </div>
            <hr class="border border-2 ">
                <div class="" >
                  <u>Map Mode</u>
                  <table class="text-center" style="width:100%;">
                    <tr>
                      <td>
                        <label class="cssbutton">
                          <input type="radio" name="mapmode" onclick="sunmode('rise')">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                      <td>
                        <label class="cssbutton">
                          <input type="radio" name="mapmode" checked onclick="intervalWeather()">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                      <td>
                        <label class="cssbutton">
                          <input type="radio" name="mapmode" onclick="sunmode('set')">
                          <div class="cssmark"></div>
                        </label>
                      </td>
                    </tr>
                    <tr style="line-height:0.6;">
                      <td><span style="color:white;font-size:20px;">&#9788;</span> Day</td>
                      <td><span style="color:white;font-size:20px;">&#9680;</span> Auto</td>
                      <td><span style="color:white;font-size:20px;">&#9214;</span> Night</td>  
                    </tr>
                  </table>
                </div>
        </div>
        
      </div>
<!-- ***************************************** End of Mini Side Menu ***** -->


    <script type="text/javascript">
      function displayCurrentDateTime() {
          const now = new Date(); // Mendapatkan waktu saat ini

          const days = ["Sun","Mon","Tue","Wed", "Thu", "Fri", "Sat"];
          const day = days[now.getDay()]
          const date = now.getDate()
          const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
          const month = months[now.getMonth()]
          const year = now.getFullYear()
          const hours = String(now.getHours()).padStart(2, '0')
          const minutes = String(now.getMinutes()).padStart(2, '0')
          const seconds = String(now.getSeconds()).padStart(2, '0')
          const zone = now.getTimezoneOffset()

          if(zone == -420){tmzon="WIB"}
          else if(zone == -480){tmzon="WITA"}
          else if(zone == -540){tmzon="WIT"}
            else{
              let gmt=zone/-60
              let minu = Math.abs(zone % 60)
              let hr = Math.floor(gmt)
              if (gmt<0) {tmzon="UTC"+hr+"."+minu}
              else if (gmt>=0) {tmzon="UTC+"+hr+"."+minu}
            }

          const currentDateTime = `${day}, ${date} ${month} ${year}<br>${hours}:${minutes}:${seconds} ${tmzon}`;
          document.getElementById('datetime').innerHTML=currentDateTime
      }

      let atNow = Math.floor(Date.now()/1000)

      async function dataApi(url){
        const apiSensor = await fetch(url)
        return await apiSensor.json()
      }

//pumpFetching(alamat_url_api, interval_pembacaan_api ,id_pada_elemen_dom1 ,id_pada_elemen_dom2 ,id_pada_elemen_dom3 )
function pumpFetching(uri,interval,idsignal,idpln,idwater,idkva,idvolt,idampere,idrun,idpump1,idpump2,idpump3) {
    const fetchData = async () => {
        try {
          const dat = await dataApi(uri)
          let statPum1=dat.data.statusPump1
          let statPum2=dat.data.statusPump2
          let statPum3=dat.data.statusPump3
          let usonic=dat.data.ultrasonic
          let apparpower=dat.data.apparentPower
          let vL1=dat.data.voltageL1_N
          let aL1=dat.data.currentL1
          let runM1=dat.data.runhourM1

          let apiTime=dat.data.request
          // let now=Math.floor(new Date().getTime()/1000)
          let reduce30=atNow-30

          let domOn = (id) => {
            return document.getElementById(id).src='dist/Pompa_p1_on.gif'
          }
          let domOff = (id) => {
            return document.getElementById(id).src='dist/pump_standby.png'
          }
          let water=100-((usonic/300)*100) //reverse ultrasonic
          let waterText=idwater+"_tx"
          let bgColor='rgba(50,182,233, 0.7)' //normal water 10,90,255 #0055ee #FFD700 #DC143C
          if(water>=100){water=100}

          if (apiTime>=reduce30) {
            if(water>=50 && water<80){bgColor='rgba(255,193,7, 0.6)'} //warning water
            if(water>=80){bgColor='rgba(255,13,29, 0.6)'} //danger water
            if(statPum1=="ON"){domOn(idpump1)} else{domOff(idpump1)}
            if(statPum2=="ON"){domOn(idpump2)} else{domOff(idpump2)}
            if(statPum3=="ON"){domOn(idpump3)} else{domOff(idpump3)}

            document.getElementById(idwater).style.height=water.toString()+"%"
            document.getElementById(idwater).style.background=bgColor
            document.getElementById(waterText).innerHTML=usonic.toString()+"cm"
            document.getElementById(idsignal).src='dist/signal-icon.png'
            document.getElementById(idpln).src='dist/pln_icon.png'
            document.getElementById(idkva).innerHTML=apparpower+" kVA"
            document.getElementById(idvolt).innerHTML=vL1+" V"
            document.getElementById(idampere).innerHTML=aL1+" A"
            document.getElementById(idrun).innerHTML=runM1+" Hrs"

          }
          else{
            document.getElementById(idpump1).src='dist/error.png'
            document.getElementById(idpump2).src='dist/error.png'
            document.getElementById(idpump3).src='dist/error.png'
            document.getElementById(idwater).style.height=0+"%"
            document.getElementById(idwater).style.background=bgColor
            // document.getElementById(waterText).innerHTML="0cm"
            // document.getElementById(id5).src='dist/no-signal-icon.png'
          }
           
        }
      catch (error) {   //jika gagal mendapakan API JSON
            // console.error('Failed to fetch data:', error);
        }
    }
    //get first data
    fetchData()

    const intervalId = setInterval(fetchData, interval)
    return () => clearInterval(intervalId)
}

// PASUT tanjungemas
function pasutairlaut() {
  const fetchData = async () => {
        try {
          const respon = await dataApi('https://www.tanjungemas.com/api/pasut_restapi.php')
          let uSonic=respon.realtime_data.ultrasonic
          let stat=respon.realtime_data.status
          let mlws;let warnaAir;let svgico;
          
          if(stat!="OFFLINE"){mlws=uSonic+" MLWS"}
            else{mlws="Offline"}

          if(stat=="AMAN"){warnaAir="rgba(50,210,50,0.7)";svgico="dist/svg/checkmark.svg"}// #32CD32
          else if(stat=="WASPADA"){warnaAir="rgba(255,193,7,0.7)";svgico="dist/svg/exclamation.svg"}//#ffc107
          else if(stat=="BAHAYA"){warnaAir="rgba(220,35,36,0.7)";svgico="dist/svg/exclamation.svg"}//#dc3545
          else{warnaAir="#777"}
          document.getElementById("airpasut").style.color=warnaAir
          document.getElementById('sensorpasut').innerText=mlws
          document.getElementById('sensorpasutsummary').innerText=mlws
          document.getElementById('statuspasutsummary').innerText=stat
          // document.getElementById('sensorpasutsummary').style.color=warnaAir
          // document.getElementById('statuspasutsummary').style.color=warnaAir
          document.getElementById('pasutcard').style.background=warnaAir
          document.getElementById('sensorpasutcard').innerText=mlws
          document.getElementById('statuspasutcard').innerText=stat
          document.getElementById('iconpasutcard').src=svgico
          
        }
        catch (error) {   //jika gagal mendapakan API JSON
          // console.error('Failed to fetch data:', error);
        }
    }
    //get first data
    fetchData()

    const intervalId = setInterval(fetchData, 10000)
    return () => clearInterval(intervalId)
}
pasutairlaut()


//weather function 
async function weather(param){
      const api=await fetch('https://api.openweathermap.org/data/2.5/weather?lat=-6.9464&lon=110.4246&appid=aeca8012dba8b9e855ca149019c055e2&units=metric')
      const response=await api.json()

      let cuaca=response.weather[0].description
      let kodecuaca=response.weather[0].icon
      let idcuaca=response.weather[0].id
      let suhu=response.main.temp.toFixed(0)+'°C'
      let sunrise=response.sys.sunrise
      let sunset=response.sys.sunset
      
      let timeOfDay
      let iconName
      let sun=[]

      // if default icon name contains the letter 'd'
      if(kodecuaca.indexOf('d') != -1) {
        timeOfDay = 'day';
        }
      else {
        timeOfDay = 'night';
        }

      let iconAni = `dist/weather/animated/${timeOfDay}/${idcuaca}.svg`;
      let val
      if(param=='cuaca'){val=cuaca}
      else if(param=='suhu'){val=suhu}
      else if(param=='icon'){val=iconAni}
      else if(param=='sun'){sun[0]=sunrise;sun[1]=sunset;val=sun;}
      else if(param=='suntime'){val=timeOfDay}
        return val
}

function intervalWeather(){
  weather('icon').then(result => {
    document.getElementById("iconWeather").src=result
  })
  weather('cuaca').then(result => {
    document.getElementById("cuaca").innerHTML=result
  })
  weather('suhu').then(result => {
    document.getElementById("suhuSummary").innerHTML=result
  })
  weather('icon').then(result => {
    document.getElementById("iconSummary").src=result
  })
  weather('sun').then(result => {
    if(result[0]<=atNow && atNow<result[1]){sunmode('rise')} //auto sunrise
    else if(result[1]<=atNow || atNow<result[0]){sunmode('set')} //auto sunset

  })
}

function sunmode(x){
  let img; let logo
  if(x=="rise"){img="url('dist/semarang_port_mapv3_efx.min.jpg')";filter="none"}
  else if(x=="set"){img="url('dist/semarang_port_nitev3_efx.min.jpg')";filter="invert(50%) brightness(180%)"}
  else if(x=="zone"){img="url('dist/semarang_port_map_zonasi.min.jpg')";filter="none"}
  // document.getElementById("bgimg").style.background-image=img
    document.getElementById("bgimg").style.backgroundImage=img
    document.getElementById("logo").style.filter=filter    
}

function showcard(idCard){
    let x=document.getElementById(idCard).style
    if(x.visibility==="hidden"){ x.visibility="visible";x.opacity=1;
    // document.getElementById("clear").checked=false
    }
    else{ x.visibility="hidden";x.opacity=0 }
}
function clearcard(){
  // let stat; let opa;
  // if (x==true) {stat="hidden";opa=0}
  // else if (x==false) {stat="visible";opa=1}
  let domCl=document.getElementById("clear").checked
  let domWdg=document.getElementById("widget").checked
  let domLbl=document.getElementById("label").checked
  if(domCl==false){
    domCl=true
    domWdg=false
    domLbl=false
    showcard("mainwidget")
    showcard("labelname")
  }
  else{
    domCl=false
    domWdg=true
    domLbl=true
  }
}

const apiPrasasti1="http://localhost:1880/api/prasasti1"

window.onload=intervalWeather       //get weather first data
pumpFetching(apiPrasasti1, 5000,'pras_conn','pras_pln','pras_usonic','pras_gage_1','pras_gage_2','pras_gage_3','pras_gage_4','pras_1','pras_2','pras_3')

setInterval(displayCurrentDateTime,1000)
setInterval(intervalWeather,180000)





// _______________ Initialize TOOLTIP _______________ 
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    </script>
  </body>
</html>