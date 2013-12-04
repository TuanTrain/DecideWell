<!DOCTYPE html>

<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
    <link href="css/decide.css" rel="stylesheet"/>
    <title> DecideWell </title>
    <script>
        function myFunction()
        {
            var node=document.createElement("div");
            var textnode=document.createTextNode("new thing");
            node.appendChild(textnode);
            document.getElementById("otext").appendChild(node);
        }
    </script>
<body>
    <div class="container">   
        <div id = top>
            <a href="/"><img alt="cute cat" src="cat.jpg" width="100" height="80"/></a>
        </div>
        <div id = left> 
            <div id = menu1 class=menu>
                    <button type="button" onclick="myFunction()">Click Me!</button>
            </div>
            <div id = menu2 class=menu>
                will go
            </div>
            <div id = menu3 class=menu>
                here
            </div> 
        </div>
        <div id = middle>
            <div id= oval>
                <div id= otext>
                    <div> First decision. What should I do? OMG.  </div>
                </div>
            </div> 
        </div>   
        <div id = bottom> Copyright etc. </div>
    </div>
</body>
</html>
