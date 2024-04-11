<?php

if(!empty($_POST)){
    $conn = mysqli_connect('localhost','root','','mashupx');
    if(!empty($_POST['vybe'])){
        echo ' <div id="iframeshell">',
        '<form method = "post"></form>';
        echo'<div src ="showy.php" id ="iframeshellheader">Drag to lock position<a href ="http://localhost/apps/ajoweb/"><button class ="hideframe" name =""hideframe>X</button></a></div>',
        '
         <p>Move</p>
    
        <p>this</p>
        <p>DIV</p></form>';
         echo ' </div>';
    }
    elseif(isset($_POST['like'])){
if ($conn){
    $likes =0;
    $insert = "INSERT INTO project_one(likes) VALUES ('$likes')";
   $result= mysqli_query($conn,$insert);
}
   $counte ="SELECT * FROM project_one";
    $resulte=mysqli_query($conn,$counte);
if(mysqli_num_rows($resulte)>0)
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($resulte);

  mysqli_free_result($resulte);
  }
mysqli_close($conn);

}}
?>
<html>
    <style>
        .main{
            background-color: pink;
            margin-top: .4rem;
            display: grid;
            grid-template-columns: .6fr 8fr .6fr;
        }
        .section{
            border: 2px solid black;
            background-color: #649f75a8;
        }
        .center{
            background-color:#379186 ;
        }
        .video-holder{
            margin-top: .4rem;
           width: 100%;
           margin-inline: auto;
        }
        iframe{
            width: 100%;
        }
        video{
            margin: 0;
        }
        .icon{
            width: 1.2rem;
        }
        .like{
            background: transparent;
        }
    </style>
    <div class="main">
        <div class="section">
            I am called section
        </div>
        <div class="section center">
            <div class="video-holder">
                <iframe src="files/ajo1.mp4" frameborder="1">

                </iframe>
                <div class="like">
                    <form action="" method="post">
                        <button name="like" type="submit" value="xx" class="like">
                    <img src="icons/heart.png" alt="" class="icon">
                    </button><br>
                    <?php 
        if(!empty($rowcount)){
$_SESSION['a'] = $rowcount-1;
        
            printf($_SESSION['a']);
        }else{
           echo "show likes";
        }
               
               
        
                   ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="section">
            I am called section
        </div>

    </div>
 
        <script>
    // Make the DIV element draggable:
dragElement(document.getElementById("iframeshell"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
    </script>
</html>