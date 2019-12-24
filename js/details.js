$(document).ready(function() {

    // Show Details in add flight page 

	$("#ad1").hover(function(){
		xmlhttp = new XMLHttpRequest();	
	xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                	document.getElementById("detail1").innerHTML = content;
             	 	$("#detail1").show();
             	 	
            }
        }
        
        xmlhttp.open("GET","../admin/admin_include/flight_detail.inc.php",true);
        xmlhttp.send();      
	}, function(){
		$("#detail1").hide();   //Hide after hover
	});

    // Airport Details by ajax call
    $("#ad2").hover(function(){
        xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                    document.getElementById("adetail2").innerHTML = content;
                    $("#adetail2").show();
                    
            }
        }
        
        xmlhttp.open("GET","../admin/admin_include/airport_detail.inc.php",true);
        xmlhttp.send();      
    }, function(){
        $("#adetail2").hide();   //Hide after hover
    });
    // Airport Details by ajax call
    $("#ad3").hover(function(){
        xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var content = xmlhttp.responseText;
                    document.getElementById("adetail3").innerHTML = content;
                    $("#adetail3").show();
                    
            }
        }
        
        xmlhttp.open("GET","../admin/admin_include/airport_detail.inc.php",true);
        xmlhttp.send();      
    }, function(){
        $("#adetail3").hide();  //Hide after hover
    });



});