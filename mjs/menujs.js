
function artical(str)
{
alert(str);
 if (str == "") {
	                    
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//alert(str);
				//document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
             document.getElementById("atr").innerHTML = xmlhttp.responseText;
            }else
			{
			
			}
        }
        xmlhttp.open("GET","index.php?f=ajax&t=ajaxmenu&ajax=yes&artc="+str,true);
        xmlhttp.send();
    }
	
}

function checkall()
{
     alert("hhhhh");
     var alla = document.getElementById("all");
	// alert(alla.checked);
	 checkboxes = document.getElementsByName('artical[]');
	 if( alla.checked == true) {
	 	for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = true;
	    }
      }
	  else{
	 	for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = false;
	    }
      }
}		  
    


