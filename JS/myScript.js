var licznikUzytychFunkcji=0;

function myFunction(){
	document.writeln(5 + 6);
	licznikUzytychFunkcji+=1;
}
function onLoad(){
	document.getElementById("cztery").addEventListener("click", displayDate);
	let button = document.getElementById("szesc");
	button.addEventListener("mousedown",tmp());
	
	licznikUzytychFunkcji+=1;
}

function tmp(){
	if (event.button == 0) {
		console.log("Left button");
	} else if (event.button == 1) {
		console.log("Middle button");
	} else if (event.button == 2) {
		console.log("Right button");
	}
	
	licznikUzytychFunkcji+=1;
}


function myFunction2(){
	if (document.getElementById("demo").innerText=="xD"){
		document.getElementById("demo").innerHTML="XD";
	}else{
		document.getElementById("demo").innerHTML="xD";
	}

	licznikUzytychFunkcji+=1;
}
function myFunction3(){
	let text = prompt("Wprowadź jakiś tekst", "jakiś tekst");
	window.alert("Wprowadziłeś tekst: "+text);
	licznikUzytychFunkcji+=1;
}

function doAll(){
	document.getElementById("parseInt").value=
	parseInt(document.getElementById("parseInt").value,10);
	document.getElementById("parseFloat").value=
	parseInt(document.getElementById("parseFloat").value)+0.0001;
	document.getElementById("losowaLiczba").innerHTML = Math.random()*100;
	document.getElementById("floor").value=
	Math.floor(document.getElementById("losowaLiczba").innerHTML);
	licznikUzytychFunkcji+=1;
}



function displayDate() {
	document.getElementById("piec").innerHTML = Date();
	licznikUzytychFunkcji+=1;
}

function leep(){

	let text="";
	let n=document.getElementById("num").value;
	let i;
	for(i=1;i<=n;i+=1){
		text=text+"\n OUTPUT: "+fibonacci(i);
	}
	window.alert(text);
	licznikUzytychFunkcji+=1;
}

function fibonacci(n) {
	if (n === 0) return 0;
	else if (n === 1 || n === 2) 
		return 1;
	else if (n > 2) {
		var a = 1;
		var b = 1;
		var c = 0;
		for (var i = 0; i < n - 2; i++) {
			c = a + b;
			a = b;
			b = c;
		}
		return c;
	}
}
function ilefunkcji(){
	licznikUzytychFunkcji+=1;
	window.alert(licznikUzytychFunkcji);
}