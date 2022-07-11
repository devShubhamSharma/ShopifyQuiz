<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif
        }

        p {
            margin: 0%
        }

        body {
            height: 100vh;
            background-color: bisque;
            padding: 10px
        }

        .container {
            margin: 30px auto;
            background: white;
            padding: 20px 15px
        }

        label.box {
            display: flex;
            margin-top: 10px;
            padding: 10px 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid #ddd
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third,
        #four:checked~label.forth,
        #five:checked~label.fifth,
        #six:checked~label.sixth,
        #seven:checked~label.seveth,
        #eight:checked~label.eighth {
            border-color: #8e498e
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle,
        #four:checked~label.forth .circle,
        #five:checked~label.fifth .circle,
        #six:checked~label.sixth .circle,
        #seven:checked~label.seveth .circle,
        #eight:checked~label.eighth .circle {
            border: 6px solid #8e498e;
            background-color: #fff
        }

        label.box:hover {
            background: #d5bbf7
        }

        label.box .course {
            display: flex;
            align-items: center;
            width: 100%
        }

        label.box .circle {
            height: 22px;
            width: 22px;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid #ddd;
            display: inline-block
        }

        input[type="radio"] {
            display: none
        }

        .btn.btn-primary {
            border-radius: 25px;
            margin-top: 20px
        }

        @media(max-width: 450px) {
            .subject {
                font-size: 12px
            }
        }
    </style>
</head>

<body>
    <div class="container mb-5">
        <div class="list-group">
            <h2 class="text-primary display-6 my-1">Time</h2><br />
            <h2 class="text-primary display-6 my-1 countdown"></h2>
            <h1 id="devtools-state"></h1>
            <h1 id="devtools-orientation"></h1>
            <div class="row">
                <div class="col-12 ">
                    <p id="demo"></p>
                    <div id="countdown">
                        <ul>
                            <li><span id="days"></span>days</li>
                            <li><span id="hours"></span>Hours</li>
                            <li><span id="minutes"></span>Minutes</li>
                            <li><span id="seconds"></span>Seconds</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <p class="fw-bold">1. Which of the following sentences is correct</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <input type="radio" name="box" id="one" checked>
                                <input type="radio" name="box" id="two">
                                <input type="radio" name="box" id="three">
                                <input type="radio" name="box" id="four">
                                <label for="one" class="box first">
                                    <div class="course"> <span class="circle"></span> <span class="subject"> When its raining ,people's umbrella are all you're going to see from above </span> </div>
                                </label> <label for="two" class="box second">
                                    <div class="course"> <span class="circle"></span> <span class="subject"> When its raining,people's umbrella are all your going to see from above </span> </div>
                                </label> <label for="three" class="box third">
                                    <div class="course"> <span class="circle"></span> <span class="subject"> When its raining,peoples umbrella's are all you're going to see from above </span> </div>
                                </label> <label for="four" class="box forth">
                                    <div class="course"> <span class="circle"></span> <span class="subject"> None of the above </span> </div>
                                </label>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center"> <button class="btn btn-primary px-4 py-2 fw-bold"> continue</button> </div>
            </div>
        </div>
    </div>
    <script>
        /**@abstract
         * detect second time reload 
         */
        console.log("ssss ", performance.navigation.type);

        
        /**
         * disable right click
         */
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
        /**
         * disable right click end
         */

        /**
         * disable slelection
         */
        const disableselect = (e) => {
            return false
        }

        
        document.onselectstart = disableselect
        document.onmousedown = disableselect

        /**
         * disable slelection END
         */

        /**
         * detect multiple window
         */
        // Broadcast that you're opening a page.
        localStorage.openpages = Date.now();
        window.addEventListener('storage', function(e) {
            if (e.key == "openpages") {
                // Listen if anybody else is opening the same page!
                localStorage.page_available = Date.now();
            }
            if (e.key == "page_available") {
                alert("One more page already open");
            }
        }, false);
        /**
         * detect multiple window end
         */
        countdownTimeStart();

        function countdownTimeStart() {

            var timeCounter = 5 * 60 * 1000;
            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the timeCounter between now an the count down date
                timeCounter -= 1000;
                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((timeCounter % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeCounter % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeCounter % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                document.getElementById("countdown").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";
                console.log(minutes)

                // If the count down is over, write some text 
                if (timeCounter < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "EXPIRED";
                }
            }, 1000);
        }


        /************************* */

        /*!
devtools-detect
https://github.com/sindresorhus/devtools-detect
By Sindre Sorhus
MIT License
*/

        const devtools = {
            isOpen: false,
            orientation: undefined,
        };

        const threshold = 160;

        const emitEvent = (isOpen, orientation) => {
            globalThis.dispatchEvent(new globalThis.CustomEvent('devtoolschange', {
                detail: {
                    isOpen,
                    orientation,
                },
            }));
        };

        const main = ({
            emitEvents = true
        } = {}) => {
            const widthThreshold = globalThis.outerWidth - globalThis.innerWidth > threshold;
            const heightThreshold = globalThis.outerHeight - globalThis.innerHeight > threshold;
            const orientation = widthThreshold ? 'vertical' : 'horizontal';

            if (
                !(heightThreshold && widthThreshold) &&
                ((globalThis.Firebug && globalThis.Firebug.chrome && globalThis.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)
            ) {
                if ((!devtools.isOpen || devtools.orientation !== orientation) && emitEvents) {
                    emitEvent(true, orientation);
                }

                devtools.isOpen = true;
                devtools.orientation = orientation;
            } else {
                if (devtools.isOpen && emitEvents) {
                    emitEvent(false, undefined);
                }

                devtools.isOpen = false;
                devtools.orientation = undefined;
            }
        };

        main({
            emitEvents: false
        });
        setInterval(main, 500);


       

        //import devtools from './index.js';

        const stateElement = document.querySelector('#devtools-state');
        const orientationElement = document.querySelector('#devtools-orientation');

        stateElement.textContent = devtools.isOpen ? 'yes' : 'no';
        orientationElement.textContent = devtools.orientation ? devtools.orientation : '';

        window.addEventListener('devtoolschange', event => {
            stateElement.textContent = event.detail.isOpen ? 'yes' : 'no';
            orientationElement.textContent = event.detail.orientation ? event.detail.orientation : '';
        });

/**@abstract DETECT REFRESH PAGE */
        window.onbeforeunload = function() {
            return "Dude, are you sure you want to leave? Think of the kittens!";
        }
    </script>
</body>

</html>