var status=0;//for add more question  if alreading adding set to 1
function show(){
	
	document.getElementById('main').style.opacity="0.4";
	soption();
}

function soption(){
	var op=document.getElementById('options');
  	op.innerHTML='<div><input type="radio" name="mc" /><input type="text" class="form-control" required /><button onclick="removeOptions(this);" class="btn btn-default btn-md">-</button></div>';
      var newItem = document.createElement("button");
    var textnode = document.createTextNode("Add more options");
    newItem.appendChild(textnode);
     document.getElementById('box').insertBefore(newItem,document.getElementById('add-elem'));
     newItem.classList.add("btn","btn-success","btns");
     newItem.setAttribute("onclick","return addOptions();");
     newItem.setAttribute("id","addoption");
     //document.getElementById('question').focus();
     status=1;
}

function removeOptions(e){
	var parent=e.parentNode.parentNode;
if(e.innerHTML=="X"){
var index=e.parentNode.id;
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                parent.innerHTML+=this.responseText;//field for question deleted message for future editing
            }
        };
        xmlhttp.open("POST","delques.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("index="+index);
}
parent.removeChild(e.parentNode);

return false;
}

function addOptions(){
var op=document.getElementById('options');
var div=document.createElement("div");
op.appendChild(div);
var radio=document.createElement("input");
radio.setAttribute("type","radio");
radio.setAttribute("name","mc");
div.appendChild(radio);
var input=document.createElement("input");
input.setAttribute("type","text");
input.required="true";
input.classList.add("form-control");
var btn=document.createElement("button");
btn.appendChild(document.createTextNode("-"));
btn.setAttribute("onclick","removeOptions(this);");
btn.classList.add("btn","btn-default","btn-md");
div.appendChild(input);
div.appendChild(btn);
return false;
}

function cancel(){
	document.getElementById('question').value="";
	var parent=document.getElementById('options');
	var len=parent.childElementCount;
	for(var i=0;i<len;i++){
		parent.removeChild(parent.children[0]);
	}
	  document.getElementById('box').removeChild(document.getElementById('addoption'))
   document.getElementById('main').style.opacity="1";
    document.getElementById('add-elem').value="Add Question";
     document.getElementById('add-elem').removeAttribute("onclick");
   status=0;
}

$(document).delegate("#form1","submit",function(){
	var parent=document.getElementById('box');//dialogue box for question
	var ogparent=document.getElementById('main');//visible question list
	var options=document.getElementById('options');//options in dialogue box
	var cans=-1;
	for(i=0;i<options.childElementCount;i++){
		if(options.children[i].children[0].checked){
          cans=i;
          break;
		}
	}
	if(cans==-1)
	{
		alert("please select correct option");
		return false;
	}
	var details=new Array();
	details.push(cans);//ans index 0-indexing
	var block=document.createElement("div");
	block.classList.add("alert","list");
	var close=document.createElement("a");
	close.appendChild(document.createTextNode("X"));
	close.style.cssFloat="right";
	close.setAttribute("href","#");
	close.setAttribute("onclick","return removeOptions(this);");
	block.appendChild(close);
	block.appendChild(document.createElement("br"));
	var question=document.createElement("p");
	question.innerHTML=parent.children[0].value;//question
	question.innerHTML+="<button class='right-btn' id='update'>Edit</button>";
	details.push(parent.children[0].value);
	block.appendChild(question);
	for(var i=0;i<options.childElementCount;i++)
		{
			var radio=document.createElement("input");
			radio.setAttribute("type","radio");
			
			var option=document.createElement("span");
			option.innerHTML=options.children[i].children[1].value;//options
			details.push(options.children[i].children[1].value);
			block.appendChild(radio);
			block.appendChild(option);
			block.appendChild(document.createElement("br"));
			if(i==cans){
				radio.setAttribute("checked","checked");
      }
      else{
      radio.setAttribute("disabled","disabled");
    }
		}

		//ajax call for saving to database
		var qno;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                //field for question added message for future editing
                     qno=this.responseText;
                     //console.log(qno);
                     addAttributes(radio,block,qno);          
            }
        };
        xmlhttp.open("POST","addques.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("details="+JSON.stringify(details));
        


	ogparent.appendChild(block);
	cancel();

	$('#myModal').modal('hide');
  $('#saved').text("Changes Saved");
  $('#saved').fadeIn();
  $('#saved').fadeOut(4000);

	 return false;
});

$(document).delegate("#add","click",function(){
    	if(status!=0){
		return;
	}
        $('#myModal').modal('show');
        show();
});

$(document).delegate("#cancel","click",function(){
              cancel();
             $('#myModal').modal('hide');
                return false;

    });


function loadQuestions(){
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("main").innerHTML=this.responseText;
              
            }
        };
        xmlhttp.open("GET","load-preview.php", true);

        xmlhttp.send();	
}



function addAttributes(radio,block,qno){//function to add name to radio and add id i.e question no to block div
for(var i=2;i<block.childElementCount;i=i+3)
 (block.children[i]).setAttribute("name","anslist"+qno);
         block.setAttribute("id",qno);
}

function showTitleBox(){
	document.getElementById("ttl").style.display="block";
}


$(document).delegate("#update","click",function(){
editQuestion(this);
$('#myModal').modal('show');

});



function editQuestion(e){
	var id=e.parentNode.parentNode.id;
  var xmlhttp = new XMLHttpRequest();
  var question=new Array();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              question=JSON.parse(this.responseText);
              console.log(question);
              var coption=parseInt(question[question.length-1]);
              document.getElementById('question').value=question[0];
     var options=document.getElementById('options');
     for(var i=1;i<question.length-1;i++){
     	console.log(question[i]);
     	if(i==coption+1){
      options.innerHTML+='<div><input type="radio" name="mc" checked="checked"/><input type="text" class="form-control" required value="'+question[i]+'"/><button onclick="removeOptions(this);" class="btn btn-default btn-md">-</button></div>';
     	}
     	else
      {options.innerHTML+='<div><input type="radio" name="mc" /><input type="text" class="form-control" required value="'+question[i]+'"/><button onclick="removeOptions(this);" class="btn btn-default btn-md">-</button></div>';
      }
     }
     document.getElementById('add-elem').value="Update";
     document.getElementById('add-elem').setAttribute("onclick","updateQuestion("+id+")");
         var newItem = document.createElement("button");
    var textnode = document.createTextNode("Add more options");
    newItem.appendChild(textnode);
     document.getElementById('box').insertBefore(newItem,document.getElementById('add-elem'));
     newItem.classList.add("btn","btn-success","btns");
     newItem.setAttribute("onclick","return addOptions();");
     newItem.setAttribute("id","addoption");


              
            }
        };
        xmlhttp.open("GET","get-ques.php?id="+id, true);

        xmlhttp.send();
     
}



function updateQuestion(id){
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              document.getElementById('main').removeChild(document.getElementById(id));
              
            }
        };
        xmlhttp.open("GET","update-ques.php?id="+id, true);

        xmlhttp.send();
        

}