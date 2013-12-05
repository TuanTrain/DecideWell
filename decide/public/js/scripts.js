/**
 * scripts.js
 *
 * DecideWell
 *
 * Global JavaScript
 */

var canvas;
var context;
var canvasOffset = $("#myCanvas").offset();
var offsetX;
var offsetY;
var mouseX;
var mouseY;
var radius;

var startAngle = 1.1 * Math.PI;
var endAngle = 1.9 * Math.PI;
var counterClockwise = false;
var circles = [];

window.onLoad=function(){ handleMouseDown(e);};
function handleMouseDown(e) {

    canvas = document.getElementById('myCanvas');
    context = canvas.getContext('2d');
    offsetX = canvasOffset.left;
    offsetY = canvasOffset.top;
    radius = 60;

    mouseX = parseInt(e.clientX - offsetX);
    mouseY = parseInt(e.clientY - offsetY);
    $("#downlog").html("Down: " + mouseX + " / " + mouseY);
    //check all existing circles to see if we clicked on
    var inCircle = false;
    var tooClose = false;
    for(var i =0;i<circles.length;i++){
        if(circles.length > 0){
            //checks if we clicked in a circle
            if(Math.sqrt((mouseX-circles[i].x)*(mouseX-circles[i].x) + (mouseY-circles[i].y)*(mouseY-circles[i].y)) < radius+5){
                console.log('in circle');
                inCircle = i;
            }
            //checks if we clicked somewhere that would create an over lapping circle
            else if(Math.sqrt((mouseX-circles[i].x)*(mouseX-circles[i].x) + (mouseY-circles[i].y)*(mouseY-circles[i].y)) < radius*2+5){
                console.log('too close');
                tooClose = true;
            }
        }
    }
    if(inCircle !== false){
        //we clicked in a cirlce launch the menu
        console.log('showing menu');
        $('#circle-menu-'+inCircle).css({left:e.clientX,top:e.clientY});
        $('#circle-menu-'+inCircle).show();
    }
    else if(tooClose){
        alert('Cant create new circle, too close to existing one');
        //hide all shown menus
        $('.dropdown').hide();
    }
    else{
        //hide all shown menus
        $('.dropdown').hide();
        console.log('creating new circle');
        //Draw a new circle  
        context.beginPath();
        context.arc(mouseX, mouseY, radius, 0, 2 * Math.PI, false);
        context.fillStyle = 'rgba(255, 255, 255, 0.5)';
        //                context.fillStyle = 'green';
        context.fill();
        context.lineWidth = 5;
        context.strokeStyle = '#003300';
        context.stroke();
        
        //build a menu for it
        $('#menus').append($('<div class="dropdown" id="circle-menu-'+circles.length+'"><a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">Dropdown<b class="caret"></b></a><ul class="dropdown-menu" role="menu" aria-labelledby="dLabel"><li>Click Me</li></ul></div>'));
        
        
        //store that data
        circles.push({x:mouseX,y:mouseY});
    }    
}


$("#myCanvas").dblclick(function (e) {
    handleMouseDown(e);
});
