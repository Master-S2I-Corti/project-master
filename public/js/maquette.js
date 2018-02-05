var tabdes=[];
var placedes;
function getSemestre(filiere) // affiche les matiere et ue et semestre d'un diplome sur le tableau
{

	var filiere=JSON.parse(filiere);
	
	
	var tableau=document.getElementById("semestre");////////les tableau seront affiché dans la div semestre
	
	var allSem=filiere.semestre;////////je recupére les donnée d'une filiere

	for (var semestre=0;semestre<allSem.length;semestre++)///pour chaque  semestre 
	{
		var tabSemestre=document.createElement("table");
		//alert(tabSemestre);
		tableau.appendChild(tabSemestre);//j'ajoute in nouveau tableau dans la div
       var sName=tabSemestre.insertRow(-1);//je crée un premiere ligne dans le tableau qui contiendra le nom du semestre 
	   sName.className="titleRow";
		var cell=sName.insertCell(-1);
		 tabSemestre.className=" tabSemestre";
		 tabSemestre.id=allSem[semestre][0].id_semestre;
		
		cell.innerHTML=allSem[semestre][0].libelle;
		cell.style.width="200px";
		cell=sName.insertCell(-1);//ajoute un bouton permetant de suprimé toute les ue et matiere d'un semestre 
		cell.innerHTML="<button onclick='delSemestre(this.parentElement.parentElement.parentElement)'>Suprimer ce semestre</button>";
		cell=sName.insertCell(-1);
			cell.innerHTML="<button class='newue' '>ajouter une ue</button>";
		
		///creation de l'en téte 
		var header=tabSemestre.insertRow(-1);/////crée l'header du semestre comtenant les titre des colonne 
		header.className="header";
		cell=header.insertCell(-1);
		cell.innerHTML="Désignation";
		
		cell=header.insertCell(-1);
		cell.innerHTML="Semestre";
		cell=header.insertCell(-1);
		cell.innerHTML="coeff";
		cell=header.insertCell(-1);
		cell.innerHTML="Description       ";
	
		cell=header.insertCell(-1);
		cell.innerHTML="Responsable de l'&#39ue";
		
		
		cell=header.insertCell(-1);
		cell.innerHTML="coeff interne";
		cell=header.insertCell(-1);
		cell.innerHTML="Sous-UE";
		
		cell=header.insertCell(-1);
		cell.innerHTML="Cour(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="TD(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="TP(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="Total(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="Equiv-TD(H)";
		///////////////////////////////////
		
		///////////Creation d'une ue
		for (var ue =0;ue<allSem[semestre][1].length;ue++)//pour chaque ue du semestre 
		{
			newue(filiere.enseignant,tabSemestre);//je crée une nouvelle ligne ue 
			var uerow=tabSemestre.rows[tabSemestre.rows.length-1];//uerow est la ligne quivien d'etre crée
		
				////si les semestre on deja dess ue crée je les affiche et rentre les description a l'interieur du tableau 
			uerow.getElementsByClassName("nomUe")[0].value=allSem[semestre][1][ue][0].libelle;
			uerow.getElementsByClassName("responsable")[0].value=allSem[semestre][1][ue][0].code_professeur;
			
		/*	var i=0;
			while(uerow.getElementsByClassName("description")[0]!=document.getElementsByClassName('description')[i])
			i++;*/
	
		var des="";
		for(n=0;n<allSem[semestre][1][ue][0].description.length-1;n++)/*la table description des donnée recçus etant un tableau qui
		contien les ligne du champs description de la bdd j'utilise cette fonction pour la reconvertir en text normal a affiché dans la textearea */
		{
			 des=des+allSem[semestre][1][ue][0].description[n]+"\n";
		}	
		 des=des+allSem[semestre][1][ue][0].description[n];
			//tabdes[i]=des;
			
			uerow.getElementsByClassName("description")[0].value=des;
			uerow.getElementsByClassName("coeff")[0].value=allSem[semestre][1][ue][0].coeff;
			uerow.getElementsByClassName("nSemestre")[0].innerHTML=semestre+1;
			for (matiere in allSem[semestre][1][ue][1])
			{
				
				newmat(uerow); 
				var lasMat=tabSemestre.rows[tabSemestre.rows.length-1];
				lasMat.getElementsByClassName("nomMat")[0].value=allSem[semestre][1][ue][1][matiere].libelle;
				lasMat.getElementsByClassName("elCoeff")[0].value=allSem[semestre][1][ue][1][matiere].coeff;
					lasMat.getElementsByClassName("cour")[0].value=allSem[semestre][1][ue][1][matiere].cours;
						lasMat.getElementsByClassName("tp")[0].value=allSem[semestre][1][ue][1][matiere].tp;
							lasMat.getElementsByClassName("td")[0].value=allSem[semestre][1][ue][1][matiere].td;
							calc(lasMat);
			};
			
		}
		 
						
		var t =document.createElement("br");;
		tableau.appendChild(t);
		
		
	} 
         
	
}
/////////////////////////////////////////////////////
function affSemestre(filiere)
{
	var filiere=JSON.parse(filiere);

	var tableau=document.getElementById("semestre");
	
	
	for (var semestre=0;semestre<filiere.length;semestre++)
	{
		var tabSemestre=document.createElement("table");
		tabSemestre.style.width='100%';
		tableau.appendChild(tabSemestre);
       var sName=tabSemestre.insertRow(-1);
	   sName.className="titleRow";
		var cell=sName.insertCell(-1);
		 tabSemestre.className=" tabSemestre";
		 
		
		cell.innerHTML=filiere[semestre][0].libelle;
		cell.style.width="200px";
		///creation de l'en téte 
		var header=tabSemestre.insertRow(-1);
		header.className="header";
		cell=header.insertCell(-1);
		cell.innerHTML="Désignation";
		cell=header.insertCell(-1);
		cell.innerHTML="semestre";
		cell=header.insertCell(-1);
		cell.innerHTML="coeff";
		cell=header.insertCell(-1);
		cell.innerHTML="Description";
		cell=header.insertCell(-1);
		cell.innerHTML="responsable de l'&#39ue";
		
		
		cell=header.insertCell(-1);
		cell.innerHTML="coeff intern";
		cell=header.insertCell(-1);
		cell.innerHTML="Sous-UE";
		
		cell=header.insertCell(-1);
		cell.innerHTML="Cour(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="TD(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="TP(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="Total(H)";
		cell=header.insertCell(-1);
		cell.innerHTML="Equiv-TD(H)";
		///////////////////////////////////
		
		///////////Creation d'une ue
	
		for (var ue =0;ue<filiere[semestre][1].length;ue++)
		{
			//newue(filiere.enseignant,tabSemestre);
			uerow=tabSemestre.insertRow(-1);
			uerow.className="Uerow";
			cell=uerow.insertCell(-1);
			cell.innerHTML=filiere[semestre][1][ue][0].libelle;
			cell=uerow.insertCell(-1);
			cell.innerHTML=semestre+1;
			cell=uerow.insertCell(-1);
			
			cell.innerHTML=filiere[semestre][1][ue][0].coeff;
			cell=uerow.insertCell(-1);
			cell.innerHTML="<textarea class='description' onclick='openBox(this)'/>";
			
	
		var des="";
		for(n=0;n<filiere[semestre][1][ue][0].description.length-1;n++)
		{
			 des=des+filiere[semestre][1][ue][0].description[n]+"\n";
		}	
		 des=des+filiere[semestre][1][ue][0].description[n];
		uerow.getElementsByClassName("description")[0].value=des;
			cell=uerow.insertCell(-1);
			var t=document.createTextNode(filiere[semestre][1][ue][0].nom + " " + filiere[semestre][1][ue][0].prenom);
			cell.appendChild(t);
			if (ue   % 2 == 1)
				uerow.style.backgroundColor="Gainsboro  ";

	
			
			
		 for (matiere in filiere[semestre][1][ue][1])
			{
				
				for(var l=0;l<uerow.cells.length;l++)
					uerow.cells[l].rowSpan++;
				var matrow=tabSemestre.insertRow(-1);
				matrow.className="matiere";
				cell=matrow.insertCell(-1);
				cell.innerHTML=filiere[semestre][1][ue][1][matiere].coeff;
			
				
				cell=matrow.insertCell(-1);
				cell.innerHTML=filiere[semestre][1][ue][1][matiere].libelle;
				
				cell=matrow.insertCell(-1);
				cell.innerHTML=filiere[semestre][1][ue][1][matiere].cours;
				cell.className="cour";
				
				cell=matrow.insertCell(-1);
				cell.innerHTML=filiere[semestre][1][ue][1][matiere].td;
				cell.className="td";
				
				cell=matrow.insertCell(-1);
				cell.innerHTML=filiere[semestre][1][ue][1][matiere].tp;
				cell.className="tp";
				var c =filiere[semestre][1][ue][1][matiere].cours;
				var p=filiere[semestre][1][ue][1][matiere].tp;
				var d=filiere[semestre][1][ue][1][matiere].td;
				
				cell=matrow.insertCell();	
				cell.innerHTML=+c + +d + +p;
				
				
				cell=matrow.insertCell(-1);
				cell.innerHTML=+c*1.5 + +d + +p;
				if (ue   % 2 == 1)
				matrow.style.backgroundColor="Gainsboro  ";

				
				}
		}
		 
						
		var t =document.createElement("br");;
		tableau.appendChild(t);
		
		
	} 
}
function newue(prof,semestre) {// cree une nouvelle ue
 
    var row = semestre.insertRow(-1);//cree une nouvelle ligne a la fin du tableau
	row.className="Uerow";
	
    var cell1 = row.insertCell(-1);
	var cell2=row.insertCell(-1);
	var cell3=row.insertCell(-1);
	 var cell4=row.insertCell(-1);
	 var cell5=row.insertCell(-1);
	var c="<div ><button onclick='newmat(this.parentElement.parentElement.parentElement)'>Ajouter une matiere</button></div>";
	
	c=c+"<div><input type='text' class='nomUe' value='nom de l&#39ue'/></div>";

   c=c+"<div><button onclick='delue(this.parentElement.parentElement.parentElement)'>Suprimer l'UE</button></div>";
 
  var nsem=0;
 
  for(i=0;i<document.getElementsByClassName("tabSemestre").length;i++)
  {

	if(document.getElementsByClassName("tabSemestre")[i]==semestre)
	{
	
		nsem=i+1;
		
	}
  }
	cell1.innerHTML=c;
	cell1.className="ue";
	c="<div class='nSemestre'> ";
	
	c+=nsem;
	c+="</div>"
	cell2.innerHTML=c;
	cell2.className="ue";
	c="<input type='number' class='coeff' max='99' min='1''value='0' />";
	cell3.innerHTML=c
	cell3.className="ue";
		c="<textarea class='description' onclick='openBox(this)'/>";
		
	cell4.innerHTML=c;
	
		var i=0;
			while(row.getElementsByClassName("description")[0]!=document.getElementsByClassName('description')[i])
			i++;
		//alert(i);
	tabdes.splice(i,0,"");
	cell4.className="ue";
	
	cell5.innerHTML="<select class='responsable'></select>";
	cell5.className="ue";
	//row.getElementsByClassName('responsable').style.width='100%';
	
	for(i in prof)
	{
		var optio=document.createElement('option');
		optio.value=prof[i].code_professeur;
		optio.text=prof[i].nom+" "+prof[i].prenom;
		row.getElementsByClassName('responsable')[0].add(optio);
		
	}
	
	color(semestre);
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function newmat(currentRow) //cree une nouvelle matiere la variable est la row qui contient l'ue selectionnée 
{
	var table = currentRow.parentElement.parentElement;
	//alert (table);
	//alert(x);
	var ue=table.rows[currentRow.rowIndex].getElementsByClassName("ue");
	//alert (ue[0].rowSpan);
	var row = table.insertRow(ue[0].rowSpan+currentRow.rowIndex);
	
	
	row.className="matiere";
	//row.style.height="900px ";
	for(var i=0; i<ue.length;i++)
	{
	
		ue[i].rowSpan=ue[i].rowSpan+1;
	};
	//cree une nouvelle ligne a la fin de l'ue 
	//alert (ue.length);
   
	var cell3 = row.insertCell(-1);
    var cell4 = row.insertCell(-1);	

    var cell6 = row.insertCell(-1);
    var cell7 = row.insertCell(-1);
	var cell8 = row.insertCell(-1);
	var cell9 = row.insertCell(-1);
	var cell10=row.insertCell(-1);
	

	cell3.innerHTML = "<input type='number' class='elCoeff' value='0' max='99' min='1'/>";
     cell4.innerHTML = "<input type='text' class='nomMat' /><br><button onclick='delmat(this.parentElement.parentElement)'>Suprimer cette matiere</button>";
	
	cell6.innerHTML = "<input type='number' class='cour' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
    	
	cell7.innerHTML = " <input type='number' class='td' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
	cell8.innerHTML = "<input type='number' class='tp' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
	cell9.innerHTML = "<div class='total'>0</div>";
	cell10.innerHTML = "<div class='equiv'>0</div>";
	color(table);
	
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function calc(CurentRow) //cacul le total des heure d'une ligne et l'affiche au sa cellule total
{
	
	
	

   
   
	var c=CurentRow.getElementsByClassName("cour")[0].value;
	
	
	var d=CurentRow.getElementsByClassName("td")[0].value;
	
	var p=CurentRow.getElementsByClassName("tp")[0].value;

	CurentRow.getElementsByClassName("total")[0].innerHTML=+c + +d + +p;
	CurentRow.getElementsByClassName("equiv")[0].innerHTML=+c*1.5 + +d + +p;
	
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getjson()//envoie les donnée du tableau dans la bdd
/*
les donnée envoyées 
idsemestre
ue[
	element constitutif
	element constitutif
	ect...]
ue[
	element constitutif
	element constitutif
	ect...]
]
ect...
	

*/

{
	r=confirm("Vouler vous modifier ce semestre")
	if (r==false)
		return"";
var i;



var matiere=[];
var tout=[];//donnée qui seront  envoyees



var t=document.getElementsByClassName("tabSemestre");
	for(var nSem=0;nSem<t.length;nSem++)
	{
		if(t[nSem].getElementsByClassName("Uerow").length==0)
			return [0,"Un semestre n'a aucune UE "];
		var tabmatiere=[];
	var semestre=[];
	var descriptionSemestre=[];
	
	semestre[0]=t[nSem].id;

	var tableue=[];
	var descriptionUe=[];

	var thisue=[];
	for(var nrows=2;nrows<t[nSem].rows.length;nrows++)
		{	
			
			
			var thisRow=t[nSem].rows[nrows];
			if(thisRow.className=="Uerow")
			{
				
				if(thisue.length!=0){
					thisue.push(tabmatiere);
					tableue.push(thisue);
				
				tabmatiere=[]
				thisue=[];
				descriptionUe=[];
				
				}
				for(var i=0;i<tableue.length;i++)////test pour voir si il n'y a pas 2 ue avec le meme nom dans un semestre
				{
					
					if(tableue[i][0][0]==thisRow.getElementsByClassName("nomUe")[0].value)
				
						return[0,"Deux UE du meme semestre ont le meme nom"];
				}
				if(thisRow.getElementsByClassName("nomUe")[0].value=="")
					return[0,"Une UE n'a pas de nom"];
				descriptionUe.push(thisRow.getElementsByClassName("nomUe")[0].value);
				
				
	
				descriptionUe.push(thisRow.getElementsByClassName("coeff")[0].value);
				descriptionUe.push(thisRow.getElementsByClassName("description")[0].value);
				descriptionUe.push(thisRow.getElementsByClassName("responsable")[0].value);
				
				thisue.push(descriptionUe);
					
			}
			else
			{var matiere=[];
				if(thisRow.getElementsByClassName("nomMat")[0].value=="")
					return[0,"Une matiere n'a pas de nom"];
				matiere.push(thisRow.getElementsByClassName("nomMat")[0].value);
				matiere.push(thisRow.getElementsByClassName("elCoeff")[0].value);
				matiere.push(thisRow.getElementsByClassName("cour")[0].value);
				matiere.push(thisRow.getElementsByClassName("td")[0].value);
				matiere.push(thisRow.getElementsByClassName("tp")[0].value);
				tabmatiere.push(matiere);
				
			}
			
		}
		
		thisue.push(tabmatiere);
		
					tableue.push(thisue);
					
					if(tableue.length==0)
						return [0,"Un sememestre n'a aucune UE "];
		//semestre[1]=tableue;
		semestre.push(tableue);
		tout.push(semestre);
		
	}
//console.log(tout);

return[1,JSON.stringify(tout)];


}
/*function send(path)
{
	 //alert(getjson(path));
}*/


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




function delAll()
{
	for( sem in document.getElementsByClassName("tabSemestre") )
	{
	//	alert(sem);
		delSemestre(document.getElementById("semestre").getElementsByClassName("tabSemestre")[sem]);
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function delSemestre(currentSemestre)
{var i=currentSemestre.rows.length-1;
	while(currentSemestre.rows[i].className!="header"){
		if(currentSemestre.rows[i].className=="Uerow")
		{
			var n=0;
			while(currentSemestre.rows[i].getElementsByClassName("description")[0]!=document.getElementsByClassName('description')[n])
			n++;
		
		
			tabdes.splice(n,1);console.log(tabdes);
		}
		currentSemestre.deleteRow(i);
		i--;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function delue(r)
{
var ue=r.cells[0];
var ri=r.rowIndex;
var p=r.parentElement.parentElement;
console.log(tabdes);
var n=0;
			while(r.getElementsByClassName("description")[0]!=document.getElementsByClassName('description')[n])
			n++;
		
		
tabdes.splice(n,1);console.log(tabdes);
for(var i=0 ;i<ue.rowSpan;i++)
p.deleteRow(ri);
color(p);	
}
/////////////////////////////////////////////////////////
function delmat(r)
{
var p=r.parentElement.parentElement;

//alert(p);

for(i=r.rowIndex-1;p.rows[i].className!='Uerow';i--)//i va etre egale a l'index de l'ue de element constitutif courant
{
	//alert(i);
}

var ue=p.rows[i].getElementsByClassName("ue");
//lert(ue
for(var n=0; n<ue.length;n++)
	{
		///alert(test);
		//alert(ue[n].rowSpan);
		ue[n].rowSpan--;
	};



p.deleteRow(r.rowIndex);

if (p.rows[i].cells[0].rowSpan==1)
	delue(p.rows[i]);
else color(p);
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function color(semestre)
{
	var p=0;
	for(var l=0;l<semestre.rows.length;l++)
	{
		
		if(semestre.rows[l].className=="Uerow")
			p++;
	
	if(p%2==1)
	semestre.rows[l].style.backgroundColor="Gainsboro";}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*$(document).ready(function(){
    $("#postB").click(function(){
        alert(test());
    });
});*/
 function openBox(description){
        var overlay = document.getElementById("overlay");
      //  document.getElementById("desbox").value=description.value;
	  //alert(document.getElementsByClassName('description'));
	  overlay.style.display = "inline";
	 placedes=0;
	 while(document.getElementsByClassName('description')[placedes]!=description)
		  placedes++;
	  document.getElementById("desbox").value=description.value;
       
        
    }
    
    function closeBox(){
        var overlay = document.getElementById("overlay");
		
	//  alert(placedes);
       //tabdes[placedes]=document.getElementById("desbox").value;
	   document.getElementsByClassName('description')[placedes].value=document.getElementById("desbox").value;
        overlay.style.display = "none";
           
  }
  