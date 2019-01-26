var currentNode; 
var idcount = 0; 
image1 = new Image();
image1.src = "paccl.png";
image2 = new Image();
image2.src = "pac2.jpg";
var isMoving=false;

function start() {
   document.getElementById( "byIdButton" ).addEventListener("click", byId, false );
   document.getElementById( "insertButton" ).addEventListener("click", insert, false );
   document.getElementById( "appendButton" ).addEventListener("click", appendNode, false );
   document.getElementById( "replaceButton" ).addEventListener("click", replaceCurrent, false );
   document.getElementById( "removeButton" ).addEventListener("click", remove, false );
   document.getElementById( "parentButton" ).addEventListener("click", parent, false );
   document.getElementById( "imgCount" ).addEventListener("click", countImages, false);
   document.getElementById( "linkButton" ).addEventListener("click", chooseLink, false);
   document.getElementById( "formsButton" ).addEventListener("click", forms, false);
   document.getElementById( "anchorButton" ).addEventListener("click", chooseAnchor, false);
   document.getElementById( "colorButton" ).addEventListener("click", changeColor, false);
   document.getElementById( "colorTextButton" ).addEventListener("click", changeTextColor, false);
	document.getElementById("monk").addEventListener("click",changemoving,false);
   currentNode = document.getElementById( "kurs1" );
   
   document.addEventListener('mousemove',function(e) {
  isPressed(e);
  changeBkColor(e);
} );
document.addEventListener('mousedown',function(e) {
  isPressed(e);
} );
document.addEventListener('mouseup',function(e) {
  isPressed(e);
} );
}
function onsubmit5(){
	window.alert("Wysłano formularz");
}
function onreset5(){
	window.alert("Zresetowano formularz");
}

function changemoving(){
	if(isMoving==true)
		isMoving=false;
	else
		isMoving=true;
}
function monkeyMove(event){
	if(isMoving){
	var x=event.clientX;
	var y=event.clientY;
	document.getElementById("monk").style.position="absolute";
	document.getElementById("monk").style.top=(y-50)+"px";
	document.getElementById("monk").style.left=(x-50)+"px";
	}
}
function changeBkColor(event){
	var red=event.screenX/7;
	
	document.body.style.backgroundColor = "#"+red.toString(16)+"0000";
	
}


   function isPressed(event) {
	   document.getElementById("mouseClientCords").innerHTML=event.clientX+" | "+event.clientY;
      document.getElementById("mouseScreenCords").innerHTML=event.screenX+" | "+event.screenY;
   
	if (event.altKey) {
        document.getElementById( "isAltPressed" ).innerHTML="ON";
		document.getElementById( "isAltPressed" ).style.color="green";
			
    } 
	else{
		document.getElementById( "isAltPressed" ).innerHTML="OFF";
		document.getElementById( "isAltPressed" ).style.color="red";
		
	}
	if(event.ctrlKey){
		 document.getElementById( "isCtrlPressed" ).innerHTML="ON";
		 document.getElementById( "isCtrlPressed" ).style.color="green";
	}else{
		document.getElementById( "isCtrlPressed" ).innerHTML="OFF";
		document.getElementById( "isCtrlPressed" ).style.color="red";
	
	}
	if(event.shiftKey){
		 document.getElementById( "isShiftPressed" ).innerHTML="ON";
		 document.getElementById( "isShiftPressed" ).style.color="green";
	}else{
		document.getElementById( "isShiftPressed" ).innerHTML="OFF";
		document.getElementById( "isShiftPressed" ).style.color="red";

	}
}
window.addEventListener( "load", start, false );

var helpText;
var helpText2;

// initialize helpTextDiv and register event handlers
function init()
{
   helpText = document.getElementById( "helpText" );
   registerListeners(document.getElementById( "linkText" ), "Wprowadź numer 0-2");
} 

function registerListeners( object, messageNumber )
{
   object.addEventListener( "focus", function() { helpText.innerHTML = "Wprowadź numer 1-3"},false );
   object.addEventListener( "blur", function() { helpText.innerHTML = ""; }, false );
}

window.addEventListener( "load", init, false );

function changePhoto1() {
	document.getElementById("monk").src = "monk2.png";
}

function changePhoto2() {
	document.getElementById("monk").src = "mon3.png";

}

function mouseOver( e ) {
	if (e.target.getAttribute("id") == "pac") {
	e.target.setAttribute("src", image2.getAttribute("src") );
	}
}

function mouseOut( e ) {
	if ( e.target.getAttribute( "id" ) == "pac" ) 
      e.target.setAttribute( "src", image1.getAttribute( "src" ) );
}

function handleClick(myRadio) {
	if (myRadio.value == 0)
		document.getElementById( "fontText" ).style.font = "italic bold 20px arial";
	else if (myRadio.value == 1)
		document.getElementById( "fontText" ).style.font = "20px Century Gothic";
	else if (myRadio.value == 2)
		document.getElementById( "fontText" ).style.font = "20px Impact";
}

document.addEventListener( "mouseover", mouseOver, false );
document.addEventListener( "mouseout", mouseOut, false );

function changeTextColor() {
	var inputColor = prompt( "Podaj nowy kolor " + "tekstu", "" );
	document.getElementById("colorText").style.color = inputColor;
	window.alert(inputColor);
}

function changeColor() {
	var inputColor = prompt( "Podaj nowy kolor " + "tła tej strony", "" );
	document.body.setAttribute( "style", "background-color: " + inputColor );  
}

function chooseAnchor() {
	var x = document.anchors.namedItem(document.getElementById("anchorText").value);
	if(x)
		document.getElementById("demo2").innerHTML = x;
	else
		document.getElementById("demo2").innerHTML = "Nie ma takiego anchora";
}

function forms() {
	var x = document.forms;
	var txt = "";
	var i;
	for (i = 0; i < x.length; i++) {
    txt = txt + x[i].name + "\n";
	}
	window.alert(txt);
}

function chooseLink() {
	var x = document.links.length;
	var y = document.getElementById("linkText").value;
	if (y < x) 
		document.getElementById("demo").innerHTML = document.links.item(y).href;
	else
		document.getElementById("demo").innerHTML = "Nie mamy aż tylu linków!";
}

function countImages() {
	var x = document.images.length;
	window.alert(x);
}

function byId() {
   var id = document.getElementById( "gbi" ).value;
   var target = document.getElementById( id );

   if ( target )
      switchTo( target );
}

function insert() {
   var newNode = createNewNode(
      document.getElementById( "ins" ).value );
   currentNode.parentNode.insertBefore( newNode, currentNode );
   switchTo( newNode );
}

function appendNode() {
   var newNode = createNewNode(
      document.getElementById( "append" ).value );
   currentNode.appendChild( newNode );
   switchTo( newNode );
}

function replaceCurrent() {
   var newNode = createNewNode(
      document.getElementById( "replace" ).value );
   currentNode.parentNode.replaceChild( newNode, currentNode );
   switchTo( newNode );
} 

function remove() {
   if ( currentNode.parentNode == document.body )
      alert( "Can't remove a top-level element." );
   else
   {
      var oldNode = currentNode;
      switchTo( oldNode.parentNode );
      currentNode.removeChild( oldNode );
   }
} 

function parent() {
   var target = currentNode.parentNode;

   if ( target != document.body )
      switchTo( target );
   else
      alert( "No parent." );
} 

function createNewNode( text ) {
   var newNode = document.createElement( "p" );
   nodeId = "new" + idcount;
   ++idcount;
   newNode.setAttribute( "id", nodeId );
   text = "[" + nodeId + "] " + text;
   newNode.appendChild( document.createTextNode( text ) );
   return newNode;
} 

function switchTo( newNode ) {
   currentNode.setAttribute( "class", "" );
   currentNode = newNode;
   currentNode.setAttribute( "class", "highlighted" );
   document.getElementById( "gbi" ).value = 
      currentNode.getAttribute( "id" );
}