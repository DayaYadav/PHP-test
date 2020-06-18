<!DOCTYPE html>
<html>
<head>
<style>
#mydiv{
    text-align: center;
}
#mycanvas{
    border: 1px solid blue;
}
</style>
</head>
<body>
<div id="mydiv">
<canvas id="mycanvas" width="600" height="800" style="border:1px solid #c3c3c3"></canvas>
</div>
<script type="text/javascript">
var c=document.getElementById("mycanvas");
var context=c.getContext("2d")
//top red triangl
context.beginPath();
context.moveTo(150,200);
context.lineTo(250,200);
context.lineTo(200,100);
context.lineTo(150,200);
context.lineWidth=2;
context.strokeStyle="red";
context.stroke();

//top blue triangl
context.beginPath();
context.moveTo(50,400);
context.lineTo(150,400);
context.lineTo(100,300);
context.lineTo(50,400);
context.lineWidth=2;
context.strokeStyle="cyan";
context.stroke();

//top green triangl
context.beginPath();
context.moveTo(300,400);
context.lineTo(400,400);
context.lineTo(350,300);
context.lineTo(300,400);
context.lineWidth=2;
context.strokeStyle="green";
context.stroke();

//Connect triangle
context.beginPath();
context.moveTo(170,200);
context.lineTo(120,330);
context.lineWidth=3;
context.strokeStyle="hotpink";
context.stroke();

//Connect triangle
context.beginPath();
context.moveTo(130,370);
context.lineTo(310,375);
context.lineWidth=3;
context.strokeStyle="teal";
context.stroke();

//Connect triangle
context.beginPath();
context.moveTo(320,350);
context.lineTo(220,200);
context.lineWidth=3;
context.strokeStyle="orange";
context.stroke();



</script>
</body>
</html>