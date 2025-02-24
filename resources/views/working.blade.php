<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:300,400,400i,500,600,700|Roboto+Slab:300,400,700|Dancing+Script:400,700|Oxygen+Mono|Abril+Fatface" rel="stylesheet">
  <style>
    #demo {
  font-family: 'Montserrat', sans-serif;
  font-size: 36px;
  font-weight: 500;
  text-transform: uppercase;
  color: #333;
  padding: 50px 30px;
  display: block;
}

html {
  height: 100%;
}

section h2,
section h3 {
  font-family: 'Montserrat', sans-serif;
  font-size: 40px;
  font-weight: 700;
  text-transform: uppercase;
  color: #333;
  text-align: center;
  margin: 0 0 40px;
}

.car-page {
  overflow: hidden;
  overflow-y: scroll;
  height: 100%;
  background: -webkit-linear-gradient(180deg, #09283d, #1b415c, #29516c, #6e8ea5, #7cadd0, #7cadd0, #7cadd0, #7cadd0, #6e8ea5, #3a6583, #1a4461, #09283d);
  background: linear-gradient(180deg, #09283d, #1b415c, #29516c, #6e8ea5, #7cadd0, #7cadd0, #7cadd0, #7cadd0, #6e8ea5, #3a6583, #1a4461, #09283d);
  background-size: 2400% 2400%;
  animation: dayNight 60s ease infinite;
}

.car-page header {
  background: transparent;
}

.car-page section {
  position: relative;
  height: 100%;
}

.car-page .contact-form {
  margin-top: 50px;
  vertical-align: top;
  margin-right: 15px;
  position: relative;
  z-index: 55;
}

.car-page .contact-form .col-sm {
  width: 100%;
}

.car-page .contact-form .col-sm label {
  font-family: 'Montserrat', sans-serif;
  font-size: 30px;
  font-weight: 500;
  text-transform: uppercase;
  color: #fff;
  display: inline-block;
  vertical-align: middle;
  margin-right: 15px;
}

.car-page section .form-group .form-control {
  height: 76px;
  font-size: 36px;
  display: inline-block;
  vertical-align: middle;
  width: 210px;
}

.speed-limt {
  display: inline-block;
  border: solid 1px #d8b634;
  border-radius: 4px;
  text-align: center;
  padding: 0 25px;
  background: rgba(254, 209, 54, 0.87);
  color: #907517;
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
  font-weight: 500;
  text-transform: uppercase;
  line-height: 1.9;
  box-shadow: 0px 5px 16px rgba(0, 0, 0, 0);
}

.speed-limt-cross {
  border: solid 1px #8c170d;
  background: rgba(254, 74, 54, 0.87);
  margin-left: 15px;
  display: none;
}

.speed-limt h2,
.speed-limt-cross h2 {
  margin: 0;
  padding: 0;
}



@-webkit-keyframes driving {
  0% {
    left: -25%;
  }
  10% {
    bottom: 0%;
  }
  20% {
    transform: scale(0.5) rotateZ(-5deg);
    bottom: 5%
  }
  25% {
    transform: scale(0.5) rotateZ(0deg);
  }
  40% {
    transform: scale(0.5) rotateZ(5deg);
  }
  50% {
    transform: scale(0.5) rotateZ(0deg);
  }
  100% {
    left: 110%;
    bottom: 10%;
    transform: scale(0.5) rotateZ(0deg);
  }
}

@keyframes driving {
  0% {
    left: -25%;
  }
  10% {
    bottom: 0%;
  }
  20% {
    transform: scale(0.5) rotateZ(-5deg);
    bottom: 5%
  }
  25% {
    transform: scale(0.5) rotateZ(0deg);
  }
  40% {
    transform: scale(0.5) rotateZ(5deg);
  }
  50% {
    transform: scale(0.5) rotateZ(0deg);
  }
  100% {
    left: 110%;
    bottom: 10%;
    transform: scale(0.5) rotateZ(0deg);
  }
}

@-webkit-keyframes road-moving {
  100% {
    transform: translate(-2400px);
  }
}

@keyframes road-moving {
  100% {
    transform: translate(-2400px);
  }
}

@-webkit-keyframes wheelsRotation {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes wheelsRotation {
  100% {
    transform: rotate(360deg);
  }
}




/*   CAR CONTAINER   */

.car-container {
  position: absolute;
  bottom: -10%;
  width: 430px;
  height: 300px;
  animation: driving 5s infinite linear;
  transform: scale(0.5);
  animation-duration: 10s;
}

.car-container:after {
  content: "";
  width: 426px;
  height: 1px;
  margin-top: 88px;
  display: block;
  position: absolute;
  left: -3%;
  z-index: -1;
  bottom: 0;
  box-shadow: 2px -15px 25px 2px #000000;
}



/*   WHEELS   */

.wheel1,
.wheel2 {
  width: 120px;
  height: 120px;
  background-color: grey;
  border-radius: 50%;
  border: 20px solid black;
  position: absolute;
  bottom: 0;
  animation: wheelsRotation 1s infinite linear;
}

.wheel1 {
  left: 5%;
}

.wheel1-top,
.wheel2-top {
  bottom: 48px;
  position: absolute;
  width: 106px;
  height: 80px;
  border-radius: 50%;
  z-index: 5;
  box-shadow: 0px 13px 3px 0px rgba(240, 240, 240, 0.53);
  transform: rotateX(180deg);
}

.wheel1-top {
  left: 7%;
}

.wheel2-top {
  right: 7%;
}

.wheel2 {
  right: 5%;
}

.wheel-dot1,
.wheel-dot2 {
  width: 10px;
  height: 25px;
  background-color: black;
  position: absolute;
}

.wheel-dot3,
.wheel-dot4 {
  width: 25px;
  height: 10px;
  background-color: black;
  position: absolute;
}

.wheel-dot1 {
  top: 10%;
  left: 45%;
}

.wheel-dot2 {
  bottom: 10%;
  left: 45%;
}

.wheel-dot3 {
  top: 45%;
  right: 10%;
}

.wheel-dot4 {
  top: 45%;
  left: 10%;
}

.door {
  width: 110px;
  height: 100px;
  border: 3px solid #B57A84;
  position: absolute;
  left: 36%;
  top: 16px;
  border-radius: 10% 40% 10% 10%;
}

.door-knob {
  width: 30px;
  height: 14px;
  background-color: #E8E6E6;
  border-radius: 30%;
  position: absolute;
  left: 20%;
  top: 5%;
  border: 1px solid lightcoral;
}

.car-top1 {
  border-radius: 25% 40% 0 0;
  background-color: #6A1621;
  max-width: 100%;
  width: 250px;
  height: 130px;
  position: absolute;
  top: 0;
  left: 4%;
}

.window1,
.window2 {
  background-color: #E2F0F6;
  border-radius: 5px;
  position: absolute;
  width: 40%;
  height: 60%;
  margin: 17px;
  border: 9px solid #BF6D7B;
}

.window1 {
  left: 0;
  border-top-left-radius: 30%;
}

.window2 {
  right: 0;
  border-top-right-radius: 50%;
}

.car-top2 {
  border-radius: 100px 200px 0 0;
  background-color: #25659C;
  */ border: 10px solid #72252F;
  background-color: #9C2535;
  max-width: 100%;
  width: 430px;
  height: 140px;
  position: absolute;
  bottom: 20%;
}

.road {
  width: 250%;
  height: 200px;
  background-color: #585858;
  border-top: 10px solid #756D6D;
  border-bottom: 20px solid #756D6D;
  position: absolute;
  bottom: 0%;
  margin-left: -10px;
  padding: 0;
}

.road::before {
  content: " ";
  position: absolute;
  z-index: 0;
  top: -17px;
  left: 0px;
  right: 0px;
  border: 5px solid black;
}

.road-top-half {
  height: 15px;
  width: 250%;
  position: absolute;
  left: -10%;
  top: 30px;
  border-top: 40px dashed white;
  margin-top: 25px;
  animation: road-moving 10s infinite linear;
  transition: all 3s linear;
}

.skyline {
  width: 100%;
  position: absolute;
  bottom: 205px;
  padding: 0;
  left: 110%;
  animation: road-moving 10s infinite linear;
  transition: all 8s linear;
}

.building1 {
  width: 220px;
  height: 450px;
  background-color: #211919;
  position: relative;
}

.building1-shadow {
  border-top: 15px solid transparent;
  border-right: 60px solid rgb(44, 37, 37);
  border-bottom: 15px solid #000;
  border-left: 15px solid transparent;
  height: 450px;
  width: 200px;
  position: absolute;
  left: -199px;
}

.building-left-half,
.building-right-half {
  height: 300px;
  width: 50px;
  position: absolute;
  top: 10px;
  border-left: 16px dashed #A9D2C7;
  border-right: 16px dashed rgba(255, 255, 0, 0.19);
  margin-top: 25px;
}

.building-left-half {
  left: 10px;
  padding: 25px;
}

.building-right-half {
  right: 10px;
  padding: 20px;
}

.moon {
  height: 100px;
  width: 100px;
  border-radius: 50%;
  background: rgb(207, 207, 212);
  margin: auto;
  box-shadow: 0 0 60px gold, 0 0 100px rgb(185, 160, 24), inset 0 5px 12px 26px #F5F5F5, inset -2px 8px 15px 36px #E6E6DB;
  transition: 1s;
  transition: 1s;
  right: 370px;
  top: 30px;
  position: absolute;
  animation: sun-moon 40s 2s linear infinite;
  transform-origin: 50% 500px;
}



/*Headlights*/

.car-top1:after {
  width: 13px;
  height: 37px;
  background-color: #BACCDA;
  position: absolute;
  bottom: -63px;
  right: -168px;
  z-index: 10;
  content: " ";
  border-radius: 10px;
  border: 2px solid black;
  border-left-style: none;
  transform: rotate(-15deg);
}

.car-top2:after {
  position: absolute;
  bottom: 7px;
  right: -340px;
  content: " ";
  width: 0;
  height: 0;
  border-top: 20px solid transparent;
  border-bottom: 80px solid transparent;
  border-right: 500px solid rgba(191, 188, 87, 0.7);
  z-index: -1;
  -webkit-mask-box-image: -webkit-linear-gradient(left, black, transparent);
  -webkit-mask-box-image: -o-linear-gradient(left, black, transparent);
  -webkit-mask-box-image: linear-gradient(to right, black, transparent);
  transform: rotate(-9deg);
}


.range-slider__range {
  -webkit-appearance: none;
  width: 300px;
  height: 10px;
  border-radius: 5px;
  background: #d7dcdf;
  outline: none;
  padding: 0;
  margin: 0;
}

.range-slider__range::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}

.range-slider__range::-webkit-slider-thumb:hover {
  background: #1abc9c;
}

.range-slider__range:active::-webkit-slider-thumb {
  background: #1abc9c;
}

.range-slider__range::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}

.range-slider__range::-moz-range-thumb:hover {
  background: #1abc9c;
}

.range-slider__range:active::-moz-range-thumb {
  background: #1abc9c;
}

.range-slider__value {
  display: inline-block;
  position: relative;
  width: 60px;
  color: #fff;
  line-height: 20px;
  text-align: center;
  border-radius: 3px;
  background: #2c3e50;
  padding: 5px 10px;
  margin-left: 8px;
  border: solid 1px #edcc4a;
}

.range-slider__value:after {
  position: absolute;
  top: 8px;
  left: -7px;
  width: 0;
  height: 0;
  border-top: 7px solid transparent;
  border-right: 7px solid #2c3e50;
  border-bottom: 7px solid transparent;
  content: '';
}

.range-slider__value:before {
  position: absolute;
  top: 7px;
  left: -8px;
  width: 0;
  height: 0;
  border-top: 8px solid transparent;
  border-right: 8px solid #edcc4a;
  border-bottom: 8px solid transparent;
  content: '';
}

::-moz-range-track {
  background: #d7dcdf;
  border: 0;
}

legend {
  font-size: 14px !important;
}
  </style>
  <body class="car-page">
    <section>
      <div class="wrapper">
        <div class="contact-form">

          <div class="contact-form-row">
            <div class="form-group col-sm">
              <label>Car Speed: </label>


              <input type="range" class="range-slider__range" name="ageInputName" id="ageInputId" value="24" min="0" max="240" onchange="changeSpeed(this);" oninput="ageOutputId.value = ageInputId.value">
              <output name="ageOutputName" id="ageOutputId" class="range-slider__value">24</output>

            </div>
          </div>

        </div>
        <br>
        <div class="speed-limt">
          <h2>Speed limit : 140</h2> </div>

        <div class="speed-limt speed-limt-cross" id="limt">
          <h2>Speed limit Crossed</h2> </div>

      </div>
      <div class="skyline">
        <div class="building1-shadow"></div>
        <div class="building1">
          <div class="building-left-half"></div>
          <div class="building-right-half"></div>
        </div>
      </div>
      <div class="road">
        <div class="road-top-half"></div>
        <div class="road-bottom-half"></div>
      </div>
      <div class="car-container" id="car">
        <div class="car-top1">
          <div class="window1"></div>
          <div class="window2"></div>
        </div>
        <div class="car-top2">
          <div class="door">
            <div class="door-knob"></div>
          </div>
        </div>
        <div class="car-bottom">
          <div class="wheel1-top"></div>
          <div class="wheel1">
            <div class="wheel-dot1"></div>
            <div class="wheel-dot2"></div>
            <div class="wheel-dot3"></div>
            <div class="wheel-dot4"></div>
          </div>
          <div class="wheel2-top"></div>
          <div class="wheel2">
            <div class="wheel-dot1"></div>
            <div class="wheel-dot2"></div>
            <div class="wheel-dot3"></div>
            <div class="wheel-dot4"></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </section>
    <script>
      function changeSpeed(n) {
        var speed = document.getElementById("car");
        var speedLimt = document.getElementById("limt");
        speed.style.fontStyle = n.value;
      
        speedLimt.style.display = "none";
      
        var checkSpeed = n.value;
        switch (true) {
          case checkSpeed <= 50:
            speed.style.animationDuration = "10s";
            break;
          case checkSpeed <= 60:
            speed.style.animationDuration = "9s";
            break;
          case checkSpeed <= 70:
            speed.style.animationDuration = "8s";
            break;
          case checkSpeed <= 80:
            speed.style.animationDuration = "7s";
            break;
          case checkSpeed <= 100:
            speed.style.animationDuration = "6s";
            break;
          case checkSpeed <= 140:
            speed.style.animationDuration = "5s";
            break;
          case checkSpeed <= 145:
            speed.style.animationDuration = "5s";
            speedLimt.style.display = "inline-block";
            break;
      
          case checkSpeed <= 160:
            speed.style.animationDuration = "4s";
            speedLimt.style.display = "inline-block";
      
            break;
          case checkSpeed <= 200:
            speed.style.animationDuration = "1s";
            speedLimt.style.display = "inline-block";
            break;
          case checkSpeed <= 240:
            speed.style.animationDuration = "0.5s";
            speedLimt.style.display = "inline-block";
            break;
      
          case checkSpeed <= 241:
            speed.style.animationDuration = "100s";
            speedLimt.style.display = "inline-block";
            break;
        }
      }
    </script>
    <script>
        jQuery(window).load(function() {
  jQuery(window).scroll(function() {
    var wintop = jQuery(window).scrollTop(),
      docheight = jQuery("body").height(),
      winheight = jQuery(window).height();
    console.log(wintop);
    var totalScroll = wintop / (docheight - winheight) * 100;
    console.log("total scroll" + totalScroll);
    jQuery(".KW_progressBar").css("width", totalScroll + "%");
  });
});

    </script>
  </body>