function myFunction(){
	
	document.writeln(5 + 6);
	
}
function onLoad(){
		document.getElementById("cztery").addEventListener("click", displayDate);
		let button = document.getElementById("szesc");
		button.addEventListener("mousedown", event => {
		if (event.button == 0) {
			console.log("Left button");
		} else if (event.button == 1) {
			console.log("Middle button");
		} else if (event.button == 2) {
			console.log("Right button");
		}
});
}

function myFunction2(){
	if (document.getElementById("demo").innerText=="xD"){
	document.getElementById("demo").innerHTML="XD";
	}else{
	document.getElementById("demo").innerHTML="xD";
	}

}
function myFunction3(){
	var text = prompt("Wprowadź jakiś tekst", "jakiś tekst");
	window.alert("Wprowadziłeś tekst: "+text)
}

function doAll(){
	document.getElementById("parseInt").value=parseInt(document.getElementById("parseInt").value,10);
	document.getElementById("parseFloat").value=parseInt(document.getElementById("parseFloat").value)+0.0001;
	document.getElementById("losowaLiczba").innerHTML = Math.random()*100;
	document.getElementById("floor").value=Math.floor(document.getElementById("losowaLiczba").innerHTML);
	}

  

function displayDate() {
    document.getElementById("piec").innerHTML = Date();
}