// JavaScript Document
// COPYRIGHT MARUNGSHA :D
// box-shadow: 0 0 5px rgba(81, 203, 238, 1);
var fly=null;
var theme_rollover=null;
var menu_hover=null;
var logo_sound=null;	
var welcome_sound=null;
var text_load=null;
//---------------------------------------------
$(window).load(function (e) {
 $("#status").fadeOut("fast", function () {
        $("#pre_logo").hide("size", "fast");
    });

    $("#loader").fadeIn("fast", function () {
        $("#preloader").fadeOut("fast", function () {


            //---------------------------------------------------------------------------------------------

            $(document).ready(function (e) {


                menu_hover = soundManager.createSound({
                    id: 'mySound3',
                    url: 'sound/menu_hover.mp3',
                    autoLoad: true,
                    autoPlay: false,
                    multishotEvents: true,
                    volume: 50
                });

                //-----------------PRE INITIALIZE---------------------

                var c = document.getElementById("c");
                var ctx = c.getContext("2d");

                //making the canvas full screen
                c.height = window.innerHeight;
                c.width = window.innerWidth;


                var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                chinese = chars.split("");

                var font_size = 10;
                var columns = c.width / font_size; //number of columns for the rain

                var drops = [];
                for (var x = 0; x < columns; x++)
                    drops[x] = 1;

                //drawing the characters
                function draw() {
                    //Black BG for the canvas
                    //translucent BG to show trail
                    ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
                    ctx.fillRect(0, 0, c.width, c.height);

                    ctx.fillStyle = "rgba(32,178,170,0.4)"; //green text
                    ctx.font = font_size + "px arial";
                    //looping over drops
                    for (var i = 0; i < drops.length; i++) {
                        var text = chars[Math.floor(Math.random() * chars.length)];
                        //x = i*font_size, y = value of drops[i]*font_size
                        ctx.fillText(text, i * font_size, drops[i] * font_size);

                        //sending the drop back to the top randomly after it has crossed the screen
                        //adding a randomness to the reset to make the drops scattered on the Y axis
                        if (drops[i] * font_size > c.height && Math.random() > 0.975)
                            drops[i] = 0;

                        //incrementing Y coordinate
                        drops[i]++;
                    }
                }

                setInterval(draw, 33);

                //--------------------------------------------------------------

                $("#main").css("height", $(document).innerHeight());
                $("#logo").show("size", 400).css("left", $(document).innerWidth() / 2 - "200");
                logo_sound.play();
                $("#logo").animate({
                    top: "10px", left: $(document).innerWidth() / 2 - "200"
                }, 400, function () {

                    $("#info").show("scale", 100).animate({ top: "200px", right: "60px" }, 300, function () {
                        $("#facebook").show("scale", 100);
                        fly.play(); // broken here
                        $("#facebook").toggleClass("social_after", 400, function () {
                            $("#twitter").show("scale", 100);
                            fly.play(); // broken here
                            $("#twitter").toggleClass("social_after2", 400, function () {
                                welcome_sound.play();
                                $(".welcome").show("scale", 800, function () {

                                    $("#welcome").hide("puff", 700, function () {
                                        fly.play();
                                        $("#header").slideDown("slow");
                                        $(".welcome").toggleClass("welcome_after", 400).animate({ left: "45%" }, 200, function () {
                                            $("#navigation").show("scale", 200);
                                            fly.play();
                                            $("#navigation").toggleClass("animated", 200, function () {
                                                $("#loader").hide("size", 400);
                                            });

                                        });
                                    });
                                });
                            });
                        });
                    });

                });



                $("#theme").mouseenter(function () {
                    $(this).text("the techno battle");
                    theme_rollover.play();
                    $(this).textEffect({
                        fps: 40,
                        repeat: 2,
                        debug: false,
                        reverse: false,
                        possibleChar: "adcdefghijklmnopqrstuvwxyz"
                    });
                });


                $("#navigation>li").on("mouseenter", function () {
                    menu_hover.play();
                });


                //---------------------------ABOUT-----------------------------------------------

                $("#info").click(function (e) {
                    //$("#main").css("-webkit-filter","blur(20px)");
                    $("#main").hide("fast");
                    //$("#about").slideDown("slow");
                    $("#about").show("fast"); ;


                });

                $("#about").click(function (e) {
                    $(this).slideUp("slow", function () {
                        $("#main").slideDown("slow");
                    });
                    //$("#main").css("-webkit-filter","blur(0px)");
                });

                $("#facebook").click(function (e) {
                    $(".social_holder").toggle("show").toggleClass("social_holder2", 400);
                });

                $("#sponsors_now").click(function (e) {
                   // $(this).effect("highlight");
                    $(this).addClass("sponsors_selected");
                    $(".past").slideUp(function () {
                        $("#sponsors_last").removeClass("sponsors_selected");
                        $(".present").slideDown();
                    });

                });
                $("#sponsors_last").click(function (e) {
                    $(this).effect("highlight");
                    $(this).addClass("sponsors_selected");
                    $(".present").slideUp(function () {
                        $("#sponsors_now").removeClass("sponsors_selected");
                        $(".past").slideDown();
                    });


                });

                ///-------------------------MOUSE------------------------------------------------	

                var oldY = 0;
                var oldX = 0;

                $(this).mousemove(function (e) {
                    var topnav = parseFloat($("#navigation").css("top"));
                    var leftnav = parseFloat($("#navigation").css("left"));

                    var topscreen = parseFloat($("#menu_screen").css("top"));
                    var leftscreen = parseFloat($("#menu_screen").css("left"));

                    var toplogo = parseFloat($("#logo").css("top"));
                    var leftlogo = parseFloat($("#logo").css("left"));

                    var topinfo = parseFloat($("#info").css("top"));
                    var leftinfo = parseFloat($("#info").css("left"));

                    var toplefttab = parseFloat($("#lefttab").css("top"));
                    var leftlefttab = parseFloat($("#lefttab").css("left"));

                    var toprighttab = parseFloat($("#righttab").css("top"));
                    var leftrighttab = parseFloat($("#righttab").css("left"));

                    var topabout = parseFloat($("#about").css("top"));
                    var leftabout = parseFloat($("#about").css("left"));

                    var newY = e.pageY - oldY;
                    var newX = e.pageX - oldX;


                    if (oldY != 0) {

                        $("#navigation").css("top", topnav + newY / 50);
                        $("#menu_screen").css("top", topscreen + newY / 80);
                        $("#logo").css("top", toplogo + newY / 400);

                        $("#info").css("top", topinfo + newY / 60);

                    }
                    else {
                        $("#log").html(oldY + "::" + newY + "::");
                    }
                    if (oldX != 0) {
                        $("#navigation").css("left", leftnav + newX / 50);
                        $("#menu_screen").css("left", leftscreen + newX / 80);
                        $("#logo").css("left", leftlogo + newX / 400);

                        $("#info").css("left", leftinfo + newX / 60);

                    }
                    oldY = e.pageY;
                    oldX = e.pageX;


                });

                $("#button_top").click(function (e) {
                    var top = parseInt($(".imagelist").css("margin-top")) - 230;
                    $(".imagelist").animate({ marginTop: top + "px" }, 200);
                });

                $("#button_bottom").click(function (e) {

                    var top = parseInt($(".imagelist").css("margin-top")) + 230;
                    $(".imagelist").animate({ marginTop: top + "px" }, 200);
                });

                $("#close").click(function () {
                    $(this).hide("fade");
                    $("#other_page").slideUp("slow", function () {
                        $("#main").show("drop", "slow");
                    })
                });
                //-------------------------MOUSE------------------------------------------------
                //------------------------NAVIGATION CONTROL--------------------------------------	
                $("#navigation>li").click(function (e) {
                    $("#navigation>li").removeClass("selected");
                    $(this).addClass("selected");
                    var switcher = $(this).text();
                    var allScreen = $(".screen");




                    $("#about").hide("fade", 200);
                    $(".screen").hide("slide", 300);

                    switch (switcher) {

                        case "EVENTS":
                            {
                                $("#loader").show("fast");
                                $("#main").hide("drop", "slow");
                                $("#other_page").load("events.html", function () {
                                     $("#loader").hide("size");
                                });
                                fly.play();
                                $("#close").show("fade");
                                $("#other_page").show();

                                break;
                            }
                        case "SPONSORS":
                            {
                                if ($("#sponsors").css("display") == "none") {
                                    $("#loader").show("size");
                                    
                                    $("#sponsors").load("sponsors.html", function () {$("#loader").hide("size");});
                                    
                                     fly.play();
                                      $("#sponsors").show("slide", 200, function () {
                                            $("#sponsor_list").show("highlight", 300, function () {
                                                $("#sponsors_last").click();
                                            });
                                        });

                                }

                                break;
                            }


                        case "GALLERY":
                            {
                                var current = window.location.pathname;
                                $("#main").animate({ top: "-100%" }, 1000, function () {
                                    window.location.href = "http://concettoism.co.in/gallery/gallery.html";

                                });
                                break;
                            }

                        case "CONTACT US":
                            {
                                if ($("#contact").css("display") == "none") {
                                    $("#loader").show("size");
                                    $("#contact").load("contact.html", function () {
                                        $("#loader").hide("size");
                                       });
                                       fly.play();
                                    $("#contact").show("slide", 400);
                                    $("#navigation").animate({ left: "20px" }, 200);
                                }


                                break;
                            }

                        case "HOME":
                            {
                                //$("#navigation").animate({ left: "100px" }, 200);
                                break;
                            }

                        case "REGISTER":
                            {

                                $("#main").hide();
                                $("#loader").show("size");
                                $("#other_page").load("register.html", function () {
                                    fly.play();
                                   
                                    $("#loader").hide("size");
                                });
                                 $("#close").show();
                                 $("#other_page").show("slide");

                                break;
                            }

                        case "ADMINISTRATION":
                            {

                                break;
                            }


                    }


                });
            });
            ///------------------------NAVIGATION CONTROL--------------------------------------
        });


    });
});

//-------------------------------------------------------------------------------------

///------------------------TOPTAB CONTROL---------------------------------------------

$(window).resize(function(e) {
	//$("#main").css("width",window.innerWidth);
	$("#background").css("width",window.innerWidth);
	$("#log").html(window.innerWidth+"::"+ window.innerHeight);
	$("#logo").css("left",window.innerWidth * 0.5-"300");
	$("#info").animate({left:window.innerWidth-80},100);
});

soundManager.setup({
  url: '/swf/',
  flashVersion: 9,
  onready: function() {
    fly=soundManager.createSound({
		  id: 'mySound1',
		  url: 'sound/fly.mp3',
		  autoLoad: true,
		  autoPlay:false,
		  multishotEvents:true,
		  volume: 100
	});
	
	theme_rollover=soundManager.createSound({
		  id: 'mySound2',
		  url: 'sound/theme_rollover.mp3',
		  autoLoad: true,
		  autoPlay:false,
		  multishotEvents:true,
		  volume: 100
	});
	
	logo_sound=soundManager.createSound({
		  id: 'mySound4',
		  url: 'sound/logo.mp3',
		  autoLoad: true,
		  autoPlay:false,
		  multishotEvents:true,
		  volume: 100
	});
	welcome_sound=soundManager.createSound({
		  id: 'mySound5',
		  url: 'sound/welcome.mp3',
		  autoLoad: true,
		  autoPlay:false,
		  multishotEvents:true,
		  volume: 100
	});
	
	}
});
