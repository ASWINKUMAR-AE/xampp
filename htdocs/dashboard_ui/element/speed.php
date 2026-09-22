<div id="gaugecontainer">
        <div id="gauge">
            <div id="scale"></div>
            <div id="scalemask"></div>
            <div id="zeromark"></div>
            <div id="gaugelabel">KM/H</div>

            <div class="labelpos" id="pos0">⠀⠀0</div>
            <div class="labelpos" id="pos20">
                <div class="scLab" id="lab20">⠀20</div>
            </div>
            <div class="labelpos" id="pos40">
                <div class="scLab" id="lab40">⠀40</div>
            </div>
            <div class="labelpos" id="pos60">
                <div class="scLab" id="lab60">⠀60</div>
            </div>
            <div class="labelpos" id="pos80">
                <div class="scLab" id="lab80">⠀80</div>
            </div>
            <div class="labelpos" id="pos100">
                <div class="scLab" id="lab100">100</div>
            </div>
            <div class="labelpos" id="pos120">
                <div class="scLab" id="lab120">120</div>
            </div>
            <div class="labelpos" id="pos140">
                <div class="scLab" id="lab140">140</div>
            </div>
            <div class="labelpos" id="pos160">
                <div class="scLab" id="lab160">160</div>
            </div>
            <div class="labelpos" id="pos180">
                <div class="scLab" id="lab180">180</div>
            </div>
            <div class="labelpos" id="pos200">
                <div class="scLab" id="lab200">200</div>
            </div>
            <div class="labelpos" id="pos220">
                <div class="scLab" id="lab220">220</div>
            </div>
            <div class="labelpos" id="pos240">
                <div class="scLab" id="lab240">240</div>
            </div>
            <div class="labelpos" id="pos260">
                <div class="scLab" id="lab260">260</div>
            </div>
        </div>
        <div id="center"></div>
        <div id="cornerborder">
            <div id="odometer">ODO
                <div id="km_total">171234</div>
            </div>
           
        </div>
    </div>

    <div class="slidecontainer bg-dark" style="border-radius:50px;">
        <input type="range" min="0" max="270" value="1" class="slider" id="kmhslider">km/h<span style="background-color: var(--darkcolor); broder-radius:50px; padding:2px;" id="valueshow"></span>
  
    </div>


    <style>:root {
    --black: #031633;
    --lightcolor: #d48961;
    --color: #c7622a;
    --darkcolor: #8b441d;
}
* {
    margin: 0px;
    background-color:  !important;
}


.slidecontainer{
    position: absolute;
    top: 8px;
    left: 8px;
    padding: 3px;
    border-top: 1px solid var(--darkcolor);
    border-left: 1px solid var(--darkcolor);
    border-radius: 6px;
}
#kmhslider{
    appearance: none;
    height: 1px;
    width: 200px;
    background: #00ffff44;
    margin-top: 10px;
    margin-bottom: 10px;

}


#gaugecontainer {
    /*remove margin for raspi*/
    width: 80%;                /* Adjust the size (percentage of parent container) */
    height: 80%;               /* Adjust the size (percentage of parent container) */
    max-width: 400px;          /* Prevent width from growing too large */
    max-height: 400px;         /* Prevent height from growing too large */
    position: relative;        /* Allow positioning of child elements inside */
    border: 1px solid #FF800033;
    background-color: var(--black);
    border-radius: 100%;       /* Keep it circular */
    overflow: hidden;
}
#gauge {
    position: absolute;
    --size: 53%;
    width: var(--size);
    height: var(--size);
    top: calc( (100% - var(--size)) * 0.5);
    left: calc( (100% - var(--size)) * 0.5);
    border-radius: 50%;
    background-blend-mode: multiply;
}
#center{
    background-color: var(--black);
    position: absolute;
    --size: 30%;
    width: var(--size);
    height: var(--size);
    top: calc( (100% - var(--size)) * 0.5);
    left: calc( (100% - var(--size)) * 0.5);
    border-radius: 50%;
}
#scale {
    background: repeating-conic-gradient(from 269deg, var(--darkcolor) 1deg 9.4deg, black 9.4deg 10.6deg, var(--darkcolor) 10.6deg 19deg, black 19deg 21deg),
                conic-gradient(from 178deg, black 0deg 90deg, white 101deg 351deg, black 360deg );
    background-blend-mode: multiply;
    position: absolute;
    --size: 102%;
    width: var(--size);
    height: var(--size);
    top: calc( (100% - var(--size)) * 0.5);
    left: calc( (100% - var(--size)) * 0.5);
    border-radius: 100%;
    z-index: -2;
}
#scalemask {
    
        position: absolute;
        --size: 100.5%;
        width: var(--size);
        height: var(--size);
        top: calc( (100% - var(--size)) * 0.5);
        left: calc( (100% - var(--size)) * 0.5);
        border-radius: 100%;
        background-color: var(--black);
        z-index: -1;
    }
    
    #center {
        background-color: var(--black);
        position: absolute;
        --size: 30%;
        width: var(--size);
        height: var(--size);
        top: calc( (100% - var(--size)) * 0.5);
        left: calc( (100% - var(--size)) * 0.5);
        border-radius: 50%;
    }

/*positioning of the scale numbers*/
.labelpos{
    position:absolute;
    top: 50%;
    right: 50%;
    width: 65.5%;
    transform-origin: 100% center;
    line-height: 0px;
    font-size: 200%;
}
.scLab{
    position:absolute;
    width:fit-content;
    color:white;

    font-size: 10px !important;
}
:root{
     --r20: 17.5deg;
     --w20: 65%;

     --r40: 36deg;
     --w40: 64.5%;
     
     --r60: 56deg;
     --w60: 63%;
     
     --r80: 75deg;
     --w80: 61%;
     
    --r100: 98.4deg;
    --w100: 60.1%;
    
    --r120: 119deg;
    --w120: 61%;
    
    --r140: 139.5deg;
    --w140: 61%;
    
    --r160: 160deg;
    --w160: 61%;
    
    --r180: 178.8deg;
    --w180: 61.2%;
    
    --r200: 198deg;
    --w200: 61.4%;
    
    --r220: 218deg;
    --w220: 61%;
    
    --r240: 238deg;
    --w240: 60.5%;
    
    --r260: 259deg;
    --w260: 60%;
    
}
#pos20{
    transform: rotate(var(--r20));
    width: var(--w20);
}
#lab20 {
    transform: rotate(calc(0deg - var(--r20)));
}
/***/
#pos40{
    transform: rotate(var(--r40));
    width: var(--w40);
}
#lab40 {
    transform: rotate(calc(0deg - var(--r40)));
}
/***/
#pos60{
    transform: rotate(var(--r60));
    width: var(--w60);
}
#lab60 {
    transform: rotate(calc(0deg - var(--r60)));
}
/***/
#pos80{
    transform: rotate(var(--r80));
    width: var(--w80);
}
#lab80 {
    transform: rotate(calc(0deg - var(--r80)));
}
/***/
#pos100{
    transform: rotate(var(--r100));
    width: var(--w100);
}
#lab100 {
    transform: rotate(calc(0deg - var(--r100)));
}
/***/
#pos120{
    transform: rotate(var(--r120));
    width: var(--w120);
}
#lab120 {
    transform: rotate(calc(0deg - var(--r120)));
}
/***/
#pos140{
    transform: rotate(var(--r140));
    width: var(--w140);
}
#lab140 {
    transform: rotate(calc(0deg - var(--r140)));
}
/***/
#pos160{
    transform: rotate(var(--r160));
    width: var(--w160);
}
#lab160 {
    transform: rotate(calc(0deg - var(--r160)));
}
/***/
#pos180{
    transform: rotate(var(--r180));
    width: var(--w180);
}
#lab180 {
    transform: rotate(calc(0deg - var(--r180)));
}
/***/
#pos200{
    transform: rotate(var(--r200));
    width: var(--w200);
}
#lab200 {
    transform: rotate(calc(0deg - var(--r200)));
}
/***/
#pos220{
    transform: rotate(var(--r220));
    width: var(--w220);
}
#lab220 {
    transform: rotate(calc(0deg - var(--r220)));
}
/***/
#pos240{
    transform: rotate(var(--r240));
    width: var(--w240);
}
#lab240 {
    transform: rotate(calc(0deg - var(--r240)));
}
/***/
#pos260{
    transform: rotate(var(--r260));
    width: var(--w260);
}
#lab260 {
    transform: rotate(calc(0deg - var(--r260)));
}
/***/



/*the "KM/H" */
#gaugelabel{
    position:absolute;
    top: 51.5%;
    left: 3%;
    font-size: 10px;
}

#zeromark{
    position: absolute;
    top:50.3%;
    background-color: var(--color);
    width: 50%;
    height: 1%;

}

#cornerborder{
    position: absolute;
    height: 50%;
    width: 50%;
    transform: translate(-8%, 112%);
    border: 1px solid var(--color);
    border-radius: 4%;
}
#odometer{
    color: var(--darkcolor);
    position:absolute;
    right:6%;
    top: 6%;
    width: 57%;
    font-size:10px !important;
}
#needle {
    transition: transform 0.2s ease-in-out;
}

#km_total{
    position:absolute;
    top: 0px;
    right: 0px;
    border: 1px solid var(--darkcolor);
    color: var(--color);
    border-radius: 5px;
    text-align: center;
    padding: 2px 7px;
    width: 67%;;
    font-size: 160%;
}
#tripmeter{
    color: var(--darkcolor);
    position:absolute;
    right:6%;
    top: 20%;
    width: 47%;
}
#km_trip{
    position:absolute;
    top: 0px;
    right: 0%;
    border: 1px solid var(--darkcolor);
    color: var(--color);
    border-radius: 5px 5px 5px 5px;
    text-align: right;
    padding: 2px 7px;
    padding-right: 25%;
    width: 46%;;
    font-size: 10px;
}
#km_trip_decimal{
    position:absolute;
    top: 1px;
    right: -44%;
    color: var(--color);
    text-align: left;
    padding: 2px 7px;
    width: 64%;;
    font-size: 160%;
}
#tripswitch_1{
    width: 35%;
    height: 15%;
    border: 1px solid var(--color);
    background-color: var(--color);
    position: absolute;
    top:210%;
    left: 25%;
    border-radius: 100px;
}
#tripswitch_2{
    width: 35%;
    height: 15%;
    border: 1px solid #022;
    background-color: #022;
    position: absolute;
    top:10%;
    right: 0px;
    border-radius: 100px;
}
#tripswitchbutton{
    position: absolute;
    top: 70px;
    left: 10px;
    width: 80px;
    font-family: 'Eurostile';
    font-weight: normal;
    font-size: 100%;
    color: var(--color);
    text-align: center;
    border-left: 1px solid var(--darkcolor);
    border-top: 1px solid var(--darkcolor);
    background-color: transparent;
    border-radius: 5px;
}
@font-face {
    font-family: 'Eurostile';
    font-style: normal;
    font-weight: normal;
    src: local('Eurostile'), url('fonts/eurostile.ttf') format('ttf');
}
.speed_{
    display: flex;
    justify-content: center;  /* Center horizontally */
    align-items: center;      /* Center vertically */
    height: 100%;             /* Ensure parent takes full height */
    position: relative;       /* Allows absolute positioning for children */
    overflow: hidden;     
}
#speedometer {
    transition: color 0.3s ease-in-out; /* Smooth transition for color changes */
}

#speedometer.red {
    color: red;
}

#speedometer.orange {
    color: orange;
}

#speedometer.white {
    color: white;
}

    </style>
    <script>

        // kmh gauge script
// kmh gauge script
var basegradient = "repeating-conic-gradient(from 270deg, black 0deg 0.3deg, var(--color) 0.7deg 1.3deg, black 1.7deg 2deg)";

// Input values
var total_kilometers = 172312;
var totalkm = total_kilometers;
var kmh = 0;
kmh = Math.max(0, Math.min(kmh, 270));

// Log styles
var green = "color: seagreen; background-color: black; border: 1px solid seagreen; padding: 4px;";

// Initialisation
window.onload = function () {
  console.clear();
  console.log("%cInitialisation", green);
};

// Initial sweep
var sweepProgress = 0;
var InitialSweepInterv = setInterval(initialSweep, 20);
function initialSweep() {
  if (sweepProgress < 54) {
    kmh = kmh + 5;
    sweepProgress++;
    totalkm = 0;
  }
  else if (sweepProgress < 108) {
    kmh = kmh - 5;
    sweepProgress++;
    totalkm = 999999;
  }
  else {
    console.log("%cInitial Sweep Complete", green);
    clearInterval(InitialSweepInterv);
    InitialSweepInterv = null;
    totalkm = total_kilometers;
  }
};

// Updating the gauge each frame
var ScreenUpdateInterv = setInterval(screenUpdate, 20);
function screenUpdate() {
  if (kmh % 2 == 0) {
    movescale();
    updateOdometer();
  } else {
    kmh--;
    movescale();
    updateOdometer();
    kmh++;
  }
};

// Move the scale based on kmh
function movescale() {
  document.getElementById("gauge").style = "background: " + basegradient + ", conic-gradient(from 270deg, white 0deg " + kmh + "deg, black " + kmh + "deg);"
};

// Update the odometer
function updateOdometer() {
  document.getElementById("km_total").innerHTML = totalkm.toString().padStart(6, '0');
}

// Updating kmh value from slider
document.getElementById("kmhslider").oninput = function () {
  if (InitialSweepInterv == null) {
    kmh = this.value;
  }
  document.getElementById("valueshow").innerHTML = kmh;
};


    </script>
    
