function loadSemestre(semestres,prof)
{
	var tableau=document.getElementById("filiere");
		console.log(semestres);
		for(var i=0;i<semestres.length;i++)
		{
			card = document.createElement("div");
			card.classList.add('card','semestre');
			card.id=semestres[i].id_semestre;
			
			cHeader=document.createElement("div");
			cHeader.classList.add('card-header');
			cHeader.id=semestres[i].libelle;
			Nsemestre=document.createTextNode(semestres[i].libelle); 
			/*add=document.createElement('i');
			
			trash*/
			
			
			headHtml=semestres[i].libelle.toUpperCase()+"  <i class='fa fa-plus fa-2x' onclick='newUe(prof,this.parentElement.parentElement)'></i>     <i class='fa fa-trash fa-2x' onclick='deleteSem(this.parentElement.parentElement)' ></i>"
			cHeader.innerHTML=headHtml;
			cBody=document.createElement("div");
			cBody.classList.add('card-body');
			
			card.appendChild(cHeader);
			card.appendChild(cBody);
			
			tableau.appendChild(card);
			br=document.createElement("br");
			tableau.appendChild(br);
		}
}
function loadArchive(archive,prof)
{	
deleteAll();
for(i=0;i<archive.length;i++)
	{
		
		if(archive[i].annee==document.getElementById("archive").value)
		{
		file=JSON.parse(archive[i].file);
			//console.log(file);
	for(nSem=0;nSem<file.length;nSem++)
			{
				
				for(nUe=0;nUe<file[nSem].ues.length;nUe++)
				{
			//	console.log(prof);
				newUe(prof,document.getElementsByClassName("semestre")[nSem]);
				lastrow=document.getElementsByClassName("semestre")[nSem].getElementsByClassName("Uerow")[nUe];
				//console.log(lastrow);
				
				
			
					////si les semestre on deja dess ue crée je les affiche et rentre les description a l'interieur du tableau 
				lastrow.getElementsByClassName("nomUe")[0].value=file[nSem].ues[nUe].ue.nom;
				lastrow.getElementsByClassName("responsable")[0].value=file[nSem].ues[nUe].ue.responsable.id;
				lastrow.getElementsByClassName("description")[0].value=file[nSem].ues[nUe].ue.description;
				lastrow.getElementsByClassName("coeff")[0].value=file[nSem].ues[nUe].ue.coeff;
			
				lastrow.getElementsByClassName("ects")[0].value=file[nSem].ues[nUe].ue.ects;
					
					for(nMat=0;nMat<file[nSem].ues[nUe].matieres.length;nMat++)
					{
						
						newmat(document.getElementsByClassName("semestre")[nSem].getElementsByClassName("ueTable")[nUe]); 
						lasMat=document.getElementsByClassName("semestre")[nSem].getElementsByClassName("UeCard")[nUe].getElementsByClassName("matRow")[nMat];
					
						lasMat.getElementsByClassName("nomMat")[0].value=file[nSem].ues[nUe].matieres[nMat].nom;
						lasMat.getElementsByClassName("elCoeff")[0].value=file[nSem].ues[nUe].matieres[nMat].coeff;
						lasMat.getElementsByClassName("cour")[0].value=file[nSem].ues[nUe].matieres[nMat].cour;
						lasMat.getElementsByClassName("tp")[0].value=file[nSem].ues[nUe].matieres[nMat].tp;
						lasMat.getElementsByClassName("td")[0].value=file[nSem].ues[nUe].matieres[nMat].td;
						//calc(lasMat);*/
					}
				}
				
			}
		}
	}
}
function cardAffiche(archive,prof)
{
	document.getElementById("filiere").innerHTML="";
	console.log(archive);
	console.log(prof);
	for(i=0;i<archive.length;i++)
	{
		
		if(archive[i].annee==document.getElementById("archive").value)
		{
		file=JSON.parse(archive[i].file);
		console.log(file);
			//console.log(file);
		for(nSem=0;nSem<file.length;nSem++)
			{
			var tableau=document.getElementById("filiere");
			var card = document.createElement("div");
			card.classList.add('card','semestre');
			cHeader=document.createElement("div");
			cHeader.classList.add('card-header');
			Nsemestre=document.createTextNode("test"); 
			/*add=document.createElement('i');
			
			trash*/
			
			
			
			cHeader.innerHTML=file[nSem].libelle;
			cBody=document.createElement("div");
			cBody.classList.add('card-body');
			
			card.appendChild(cHeader);
			card.appendChild(cBody);
			
			tableau.appendChild(card);
			br=document.createElement("br");
			tableau.appendChild(br);
		    for(nUe=0;nUe<file[nSem].ues.length;nUe++)
				{
			//	console.log(prof);
				
				////////////new ue
				
			
	body=card.getElementsByClassName('card-body')[0];
	
	UeCard=document.createElement("div");
	Uebody=document.createElement("div");
	
	UeCard.classList.add("card","UeCard");
	Uebody.classList.add("card-body","table-responsive");
	
	UE=document.createElement("table");
	UE.classList.add("table","ueTable","ueONly");	
	header=UE.insertRow(-1);
	header.style.backgroundColor="azure";
	cell=header.insertCell(-1);
		cell.innerHTML="Désignation";
		
		cell=header.insertCell(-1);
		cell.innerHTML="Semestre";
		cell=header.insertCell(-1);
		cell.innerHTML="coeff";
		cell=header.insertCell(-1);
		cell.innerHTML="Description       ";
	
		
		cell=header.insertCell(-1);
		cell.innerHTML="Responsable de l&#39ue";
		
		cell=header.insertCell(-1);
		cell.innerHTML="ECTS";
		
		Uebody.appendChild(UE);
		UeCard.appendChild(Uebody);
		body.appendChild(UeCard);
	
	///////////////////////////////////////////////////////////////////////////////////////////////création des ue 
	var row = UE.insertRow(-1);//cree une nouvelle ligne a la fin du tableau
	row.className="Uerow";
	
    var cell = row.insertCell(-1);
	

	
	
	
	cell.innerHTML=file[nSem].ues[nUe].ue.nom;
	
	
 
  var nsem=0;
 
  for(i=0;i<document.getElementsByClassName("semestre").length;i++)
  {

	if(document.getElementsByClassName("semestre")[i]==card)
	{
	
		nsem=i+1;
		
	}
  }
	
	var cell = row.insertCell(-1);
	
	
	
	cell.innerHTML=nsem;
	
	var cell = row.insertCell(-1);
	
	cell.innerHTML=file[nSem].ues[nUe].ue.coeff;
	
	
	var cell = row.insertCell(-1);
	c="<textarea class='description' ";
	cell.innerHTML=file[nSem].ues[nUe].ue.description;
	
	
	var cell = row.insertCell(-1);
	cell.innerHTML=file[nSem].ues[nUe].ue.responsable.nom;
	var cell = row.insertCell(-1);
	cell.innerHTML=file[nSem].ues[nUe].ue.ects;
	
	
	
	
	
	header=UE.insertRow(-1);
	header.style.backgroundColor="azure";
	cell=header.insertCell(-1);
		cell.innerHTML="Sous-UE";
		
		cell=header.insertCell(-1);
		cell.innerHTML="coeff interne"
		
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
				
				/////////////////////////////////////////création des matiere 
				
					
					for(nMat=0;nMat<file[nSem].ues[nUe].matieres.length;nMat++)
					{
						mat=UE.insertRow(-1);
						cell=mat.insertCell(-1);
						cell.innerHTML=file[nSem].ues[nUe].matieres[nMat].nom;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=file[nSem].ues[nUe].matieres[nMat].coeff;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=file[nSem].ues[nUe].matieres[nMat].cour;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=file[nSem].ues[nUe].matieres[nMat].tp;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=file[nSem].ues[nUe].matieres[nMat].td;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=+file[nSem].ues[nUe].matieres[nMat].cour + +file[nSem].ues[nUe].matieres[nMat].tp + +file[nSem].ues[nUe].matieres[nMat].td;
						
						cell=mat.insertCell(-1);
						cell.innerHTML=1.5*+file[nSem].ues[nUe].matieres[nMat].cour + +file[nSem].ues[nUe].matieres[nMat].tp + +file[nSem].ues[nUe].matieres[nMat].td;
						
					}
				}
			
			}
		}
	}
}

function newUe(prof,card)

{	
	prof=JSON.parse(prof);
	body=card.getElementsByClassName('card-body')[0];
	
	UeCard=document.createElement("div");
	Uebody=document.createElement("div");
	
	UeCard.classList.add("card","UeCard");
	Uebody.classList.add("card-body","table-responsive");
	
	UE=document.createElement("table");
	UE.classList.add("table","ueTable","ueONly");	
	header=UE.insertRow(-1);
	header.style.backgroundColor="azure";
	cell=header.insertCell(-1);
		cell.innerHTML="Désignation";
		
		cell=header.insertCell(-1);
		cell.innerHTML="Semestre";
		cell=header.insertCell(-1);
		cell.innerHTML="coeff";
		cell=header.insertCell(-1);
		cell.innerHTML="Description       ";
	
		
		cell=header.insertCell(-1);
		cell.innerHTML="Responsable de l&#39ue";
		
		cell=header.insertCell(-1);
		cell.innerHTML="ECTS";
		
		cell=header.insertCell(-1);
		cell.innerHTML="<i class='fa fa-plus fa-2x' onclick='newmat(this.parentElement.parentElement.parentElement) '>    </i>     ";
		
		cell=header.insertCell(-1);
		cell.innerHTML="<i class='fa fa-trash fa-2x' onclick='deleteUE(this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement)'>    </i>     ";
		Uebody.appendChild(UE);
		UeCard.appendChild(Uebody);
		body.appendChild(UeCard);
	

	var row = UE.insertRow(-1);//cree une nouvelle ligne a la fin du tableau
	row.className="Uerow";
	row.classList.add("unlock");
    var cell = row.insertCell(-1);
	

	
	c="<div><input type='text' class='nomUe ' value='nom de l&#39ue'/>";
	cell.innerHTML=c;
	
	cell.className="nomUeC";
	/*c=c+"<i onclick='newmat(this.parentElement.parentElement.parentElement)'class='fa fa-plus ' ></i>";

   c=c+"<i onclick='delue(this.parentElement.parentElement.parentElement)' class='fa fa-trash' ></i></div>";*/
 
  var nsem=0;
 
  for(i=0;i<document.getElementsByClassName("semestre").length;i++)
  {

	if(document.getElementsByClassName("semestre")[i]==card)
	{
	
		nsem=i+1;
		
	}
  }
	
	var cell = row.insertCell(-1);
	c="<div class='nSemestre'> ";
	
	c+=nsem;
	c+="</div>"
	cell.innerHTML=c;
	
	var cell = row.insertCell(-1);
	c="<input type='number' class='coeff' max='99' min='1'  value='1' />";
	cell.innerHTML=c
	cell.className="coeffC";
	
	var cell = row.insertCell(-1);
	c="<textarea class='description' '/>";
	cell.innerHTML=c;
	cell.className="descriptionC";
	
	var cell = row.insertCell(-1);
	cell.innerHTML="<select class='responsable'></select>";
	cell.className="responsableC";
	
	for(i in prof)
	{
		var optio=document.createElement('option');
		optio.value=prof[i].code_professeur;
		optio.text=prof[i].personne.nom+" "+prof[i].personne.prenom;
		row.getElementsByClassName('responsable')[0].add(optio);
		
	}
	
	var cell = row.insertCell(-1);
	cell.innerHTML="<input type='number' class='ects' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>"
	cell.className="ectsC";
	
	cell=row.insertCell(-1);
		cell.innerHTML="<i class='fa fa-check fa-2x ' onclick='lock(this.parentElement.parentElement)'>    </i>     ";
	cell.className="lock-unlock";
	
	header=UE.insertRow(-1);
	header.style.backgroundColor="azure";
	cell=header.insertCell(-1);
		cell.innerHTML="Sous-UE";
		
		cell=header.insertCell(-1);
		cell.innerHTML="coeff interne"
		
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
		
			
		
	/*	var t =document.createElement("br");;
		tableau.appendChild(t);*/
	
	
}
function newmat(UEtable)
{	
row=UEtable.insertRow(-1);
row.classList.add("matRow");
var cell3 = row.insertCell(-1);
    var cell4 = row.insertCell(-1);	

    var cell6 = row.insertCell(-1);
    var cell7 = row.insertCell(-1);
	var cell8 = row.insertCell(-1);
	var cell9 = row.insertCell(-1);
	var cell10=row.insertCell(-1);
	


     cell3.innerHTML = "<input type='text' class='nomMat' />";
		cell4.innerHTML = "<input type='number' class='elCoeff' value='0' max='99' min='1'/>";
	cell6.innerHTML = "<input type='number' class='cour' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
    	
	cell7.innerHTML = " <input type='number' class='td' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
	cell8.innerHTML = "<input type='number' class='tp' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>";
	cell9.innerHTML = "<div class='total'>0</div>";
	cell10.innerHTML = "<div class='equiv'>0</div>";
	var cell=row.insertCell(-1);
	cell.innerHTML="<i class='fa fa-trash fa-2x' onclick='deletemat(this.parentElement.parentElement)'>    </i>  ";
}
function deleteAll()
{
$(".UeCard").remove();
}

function deleteSem(SemCard)
{
	/*console.log(SemCard);
	for(i=0;i<SemCard.getElementsByClassName('UeCard').length;i++)
		SemCard.removeChild(SemCard.getElementsByClassName('UeCard')[i]);*/
	$(SemCard).find(".UeCard").remove();
}
function deleteUE(UeCard)
{
	
	UeCard.parentElement.removeChild(UeCard);
}
function deletemat(matrow)
{
	console.log(matrow);
	$(matrow).remove();
}

function calc(CurentRow) //cacul le total des heure d'une ligne et l'affiche au sa cellule total
{
	
	
	

   
   
	var c=CurentRow.getElementsByClassName("cour")[0].value;
	
	
	var d=CurentRow.getElementsByClassName("td")[0].value;
	
	var p=CurentRow.getElementsByClassName("tp")[0].value;

	CurentRow.getElementsByClassName("total")[0].innerHTML=+c + +d + +p;
	CurentRow.getElementsByClassName("equiv")[0].innerHTML=+c*1.5 + +d + +p;
	
	
}
function lock(row)
{
	
	row.style.borderColor = "red";
	$(row).find(":input").prop('readonly', true);
	$(row).find("textarea").prop('readonly', true);

	$(row).find("select").prop('disabled', 'disabled');
	row.getElementsByClassName("lock-unlock")[0].innerHTML="<i class='fa fa-unlock fa-2x ' onclick='unlock(this.parentElement.parentElement)'>    </i>"
	row.classList.remove("unlock");
	row.classList.add("lock");
	
	
}
function unlock(row)
{
	
	row.style.borderColor = "black";
	$(row).find(":input").prop('readonly', false);
	$(row).find("textarea").prop('readonly', false);

	$(row).find("select").prop('disabled', false);
	row.getElementsByClassName("lock-unlock")[0].innerHTML="<i class='fa fa-check fa-2x ' onclick='lock(this.parentElement.parentElement)'>     </i>"
	row.classList.add("unlock");
	row.classList.remove("lock");
	
	
}
function getjson()
{
r=confirm("Vouler vous modifier ce semestre")
	if (r==false)
		return"";
var i;



var matiere={};
var tout=[];//donnée qui seront  envoyees



var semCard=document.getElementsByClassName("semestre");
	for(var nSem=0;nSem<semCard.length;nSem++)
	{
		console.log(semCard[nSem].getElementsByClassName("UeCard"));
		if(semCard[nSem].getElementsByClassName("UeCard").length==0)
						return [0,"Un sememestre n'a aucune UE "];
		var ectsTot=0;
		if(semCard[nSem].getElementsByClassName("UeCard").length==0)
			return [0,"Un semestre n'a aucune UE "];
		var tabmatiere=[];
	var semestre={};
	var descriptionSemestre=[];
	
	semestre.id_semestre=semCard[nSem].id;
	semestre.libelle=semCard[nSem].getElementsByClassName("card-header")[0].id;
	var tableue=[];
	

	
	for(var nUE=0;nUE<semCard[nSem].getElementsByClassName("UeCard").length;nUE++)
		{	
		
			var descriptionUe={};
			var thisue={};
			var tabmatiere=[];
			var UeCard=semCard[nSem].getElementsByClassName("UeCard")[nUE];
			
			for(var i=nUE+1;i<semCard[nSem].getElementsByClassName("UeCard").length;i++)////test pour voir si il n'y a pas 2 ue avec le meme nom dans un semestre
				{
					
					if(UeCard.getElementsByClassName("nomUe")[0].value==semCard[nSem].getElementsByClassName("nomUe")[i].value)
				
						return[0,"Deux UE du meme semestre ont le meme nom"];
				}
			if(UeCard.getElementsByClassName("nomUe")[0].value=="")
					return[0,"Une UE n'a pas de nom"];
				descriptionUe.nom=UeCard.getElementsByClassName("nomUe")[0].value;
				
				
				if(UeCard.getElementsByClassName("coeff")[0].value<1 || UeCard.getElementsByClassName("coeff")[0].value>99)
					return[0,"Le coefficient d'une ue n'est pas valide"];
				descriptionUe.coeff=UeCard.getElementsByClassName("coeff")[0].value;
				
				descriptionUe.description=UeCard.getElementsByClassName("description")[0].value;
				
				//descriptionUe.responsable=UeCard.getElementsByClassName("responsable")[0].value;
				var responsable={};
				responsable.id=UeCard.getElementsByClassName("responsable")[0].value;
				responsable.nom=UeCard.getElementsByClassName("responsable")[0].options[UeCard.getElementsByClassName("responsable")[0].options.selectedIndex].text;
				descriptionUe.responsable=responsable;
				//console.log("nom du prof "+UeCard.getElementsByClassName("responsable")[0].options[UeCard.getElementsByClassName("responsable")[0].options.selectedIndex].text);
				descriptionUe.ects=UeCard.getElementsByClassName("ects")[0].value;
				ectsTot+=+UeCard.getElementsByClassName("ects")[0].value;
				//alert(ectsTot);	
				thisue.ue=descriptionUe;
			
			for(var nMat=0;nMat<UeCard.getElementsByClassName("matRow").length;nMat++)
			{var matiere={};
			 var thisMatRow=UeCard.getElementsByClassName("matRow")[nMat];
				if(thisMatRow.getElementsByClassName("nomMat")[0].value=="")
					return[0,"Une matiere n'a pas de nom"];
				
				matiere.nom=thisMatRow.getElementsByClassName("nomMat")[0].value;
					
					if(thisMatRow.getElementsByClassName("elCoeff")[0].value<1 || thisMatRow.getElementsByClassName("elCoeff")[0].value>99)
					return[0,"Le coefficient d'un element constitutif n'est pas valide"];
				matiere.coeff=thisMatRow.getElementsByClassName("elCoeff")[0].value;
				
				if(thisMatRow.getElementsByClassName("elCoeff")[0].value<1 || thisMatRow.getElementsByClassName("elCoeff")[0].value>99)
					return[0,"Le coefficient d'un element constitutif n'est pas valide"];
				if(thisMatRow.getElementsByClassName("cour")[0].value<0)
					return[0,"Les heures de cour d'un element constitutif de sont pas valide"];
				
				if(thisMatRow.getElementsByClassName("tp")[0].value<0)
					return[0,"Les heures de tp d'un element constitutif de sont pas valide"];
				
				if(thisMatRow.getElementsByClassName("td")[0].value<0)
					return[0,"Les heures de td d'un element constitutif de sont pas valide"];
				
				matiere.cour=thisMatRow.getElementsByClassName("cour")[0].value;
				
				matiere.td=thisMatRow.getElementsByClassName("td")[0].value;
			    //alert("td="+thisRow.getElementsByClassName("td")[0].value +"tp="+thisRow.getElementsByClassName("tp")[0].value);
				matiere.tp=thisMatRow.getElementsByClassName("tp")[0].value;
				
				tabmatiere.push(matiere);
				
			}
			thisue.matieres=tabmatiere;
			tableue.push(thisue);
			
		}
		
		
		
					
					
					
		//semestre[1]=tableue;
		semestre.ues=tableue;
		tout.push(semestre);
		
	}
console.log(tout);
return[1,JSON.stringify(tout)];


}
