<!DOCTYPE html>
<html>
<head>
    <script>
        function testVariable() {
            var strText = document.getElementById("textone").value;          
            var strText1 = document.getElementById("textTWO").value;
            var result = strText + ' ' + strText1;
            document.getElementById('spanResult').textContent = result;
             
        }
    </script>
</head>
<body> 
    <input type="text" id="textone" />
    <input type="text" id="textTWO" />
    <button  onclick="testVariable()">Submit</button> <br />
    <span id="spanResult">

    </span>
   
     
</body>
</html>