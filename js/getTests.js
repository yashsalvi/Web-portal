 function reset(event) {
 //console.log("lol");
        document.getElementById('select-professor').selectedIndex=0;
}

function getTests(professor){
	//alert(professor);
    console.log(professor);
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var tests=JSON.parse(this.responseText);
                console.log(tests);
                var parent=document.getElementById("list-test");
                parent.innerHTML="<option disabled selected value='0'>Select Test</option>";
                for(var i=0;i<tests.length;i++){
                	var option=document.createElement("option");
                	option.setAttribute("value",tests[i][0]);
                	option.setAttribute("name","test");
                	option.innerHTML=tests[i][1];
                	parent.appendChild(option);
                	//console.log(option);

                }

            }
        };
        xmlhttp.open("GET","get-test.php?name="+professor, true);
        xmlhttp.send();
}


function getDetails(fno){
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("test-table").innerHTML=this.responseText;                

            }
        };
        xmlhttp.open("GET","get-students.php?fno="+fno, true);
        xmlhttp.send();   
}