function AddRecord() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
       document.getElementById("demo").innerHTML = xhttp.responseText;
       ca1 = document.getElementById("ca1").val();
       ca2 = document.getElementById("ca2").val();
       exam = document.getElementById("exam").val();

       document.writeln(ca1);
       
      }
    };
    xhttp.open("GET", "insertrecord.php?id=$id&ca2=$ca2", true);
    xhttp.send();
  } 
