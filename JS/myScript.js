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
  

function displayDate() {
    document.getElementById("piec").innerHTML = Date();
}