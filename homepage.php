<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        /* .hero-image{
            background-image:url(images/todo_2.png) ;
            background-repeat: no-repeat center fixed ;
            height :500px;
            position: relative;
            background-size:contain ;
            border: 10px solid wheat;
            background-clip: content-box ;
        }
        .hero-text{
            text-align: center;
            position: absolute;
            top: 50%;
            bottom: 50%;
            color: purple;
            transform: translate(-50%, -50%);
        } */
        *{
            box-sizing: border-box;
        }
        .flex{
            display: flex;
            flex-wrap: nowrap;
            background-color: purple;
            overflow-x:hidden ;
        }
       .box {
           float: left;
           width: 50%;
           padding: 50px;
           /* height:800px; */
           margin: 10px;
           font-size:30px;
           line-height: 75px;
           overflow-x:hidden ;

        }
        .box:hover{
            overflow: visible;
        }
        /* .clearfix::after{
            content: "";
            clear: both;
            display: table;
        } */
    </style>
</head>
<body style =" background:purple;">
    <div class="flex">
    <!-- <div class = "clearfix"> -->
        <div class="box" style="background-color: purple; overflow-y:hidden;">
    <pre>
         <h1>   Wanna be Organized
        all through the <span style="color:purple;">Year?</span></h1></pre>
  </div>
 <!-- <div class="container">
<div class="row">
<div class = col-md-6> -->
    <div class="box" style="background-image: url(images/todo_2.png); background-size:cover; background-repeat:no-repeat;">
    <h1 style="color: purple; margin-left:20px; text-align:center">Good Dayu!\</h1>
  <pre><p>    organise yourself with this todo app to keep
    you on the track of success and achieving your goals</p>


    </pre>

    <!-- <button style="margin-left:20px"; border-style:10px;>Login</button> -->
    </div>
    <!-- <div class="col-md-6"> -->
    <!-- <div class="hero-image">  -->
    <!-- <div class="home"> -->
    </div>
    <!-- </div> -->
    <!-- </div>
    </div>
    </div>
    </div> 
    </div>  -->
</body>
</html>