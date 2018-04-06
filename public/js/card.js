function loadSemestre(semestres,prof)
{
	var tableau=document.getElementById("filiere");
		console.log(semestres);
		for(var i=0;i<semestres.length;i++)
		{
			card = document.createElement("div");
			card.classList.add('card','semestre');
			cHeader=document.createElement("div");
			cHeader.classList.add('card-header');
			Nsemestre=document.createTextNode(semestres[i].libelle); 
			/*add=document.createElement('i');
			
			trash*/
			
			
			headHtml=semestres[i].libelle+"  <i class='fa fa-plus' onclick='newUe(prof,this.parentElement.parentElement)'></i>  <i class='fa fa-trash ' onclick='deleteSem(this.parentElement.parentElement)' ></i>"
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
	for(i=0;i<archive.length;i++)
	{
		
		if(archive[i].annee==document.getElementById("archive").value)
		{
		file=JSON.parse(archive[i].file);
			console.log(file);
		for(nSem=0;nSem<file.length;nSem++)
			{
				
				for(nUe=0;nUe<file[nSem].ues.length;nUe++)
				{
				/*ueCard=document.createElement("div");
				ueCard.classList.add('card');
				ueCard.classList.add('ueCard');*/
				newue(prof,document.getElementsByClassName("tabSemestre")[nSem]);
				lastrow=document.getElementsByClassName("tabSemestre")[nSem].rows[document.getElementsByClassName("tabSemestre")[nSem].rows.length-1];
				
				
			
					////si les semestre on deja dess ue crée je les affiche et rentre les description a l'interieur du tableau 
				lastrow.getElementsByClassName("nomUe")[0].value=file[nSem].ues[nUe].ue.nom;
				lastrow.getElementsByClassName("responsable")[0].value=file[nSem].ues[nUe].ue.responsable;
				lastrow.getElementsByClassName("description")[0].value=file[nSem].ues[nUe].ue.description;
				lastrow.getElementsByClassName("coeff")[0].value=file[nSem].ues[nUe].ue.coeff;
			
				lastrow.getElementsByClassName("ects")[0].value=file[nSem].ues[nUe].ue.ects;
					for(nMat=0;nMat<file[nSem].ues[nUe].matieres.length;nMat++)
					{
						newmat(lastrow); 
						var lasMat=document.getElementsByClassName("tabSemestre")[nSem].rows[document.getElementsByClassName("tabSemestre")[nSem].rows.length-1];
						lasMat.getElementsByClassName("nomMat")[0].value=file[nSem].ues[nUe].matieres[nMat].nom;
						lasMat.getElementsByClassName("elCoeff")[0].value=file[nSem].ues[nUe].matieres[nMat].coeff;
						lasMat.getElementsByClassName("cour")[0].value=file[nSem].ues[nUe].matieres[nMat].cour;
						lasMat.getElementsByClassName("tp")[0].value=file[nSem].ues[nUe].matieres[nMat].tp;
						lasMat.getElementsByClassName("td")[0].value=file[nSem].ues[nUe].matieres[nMat].td;
						calc(lasMat);
					}
				}
				
			}
		}
	}
}
function newUe(prof,card)

{	body=card.getElementsByClassName('card-body')[0];
	console.log(card);
	UeCard=document.createElement("div");
	Uebody=document.createElement("div");
	
	UeCard.classList.add("card","UeCard");
	Uebody.classList.add("card-body","table-responsive");
	
	UE=document.createElement("table");
	UE.classList.add("table","ueTable","ueONly");	
	header=UE.insertRow(-1);
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
		cell.innerHTML="<i class='fa fa-plus' onclick='newmat(this.parentElement.parentElement.parentElement) '>    </i>     ";
		cell=header.insertCell(-1);
		cell.innerHTML="<i class='fa fa-trash ' onclick='deleteUE(this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement)'>    </i>     ";
		Uebody.appendChild(UE);
		UeCard.appendChild(Uebody);
		body.appendChild(UeCard);
	

	var row = UE.insertRow(-1);//cree une nouvelle ligne a la fin du tableau
	row.className="Uerow";
	
    var cell = row.insertCell(-1);
	

	
	c="<div><input type='text' class='nomUe ' value='nom de l&#39ue'/>";
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
	cell.innerHTML=c;
	
	cell.className="ue";
	var cell = row.insertCell(-1);
	c="<div class='nSemestre'> ";
	
	c+=nsem;
	c+="</div>"
	cell.innerHTML=c;
	cell.className="ue";
	var cell = row.insertCell(-1);
	c="<input type='number' class='coeff' max='99' min='1'  value='1' />";
	cell.innerHTML=c
	cell.className="ue";
	var cell = row.insertCell(-1);
		c="<textarea class='description' '/>";
		
	cell.innerHTML=c;
	
		/*var i=0;
			while(row.getElementsByClassName("description")[0]!=document.getElementsByClassName('description')[i])
			i++;
		//alert(i);
	tabdes.splice(i,0,"");*/
	cell.className="ue";
	var cell = row.insertCell(-1);
	cell.innerHTML="<select class='responsable'></select>";
	cell.className="ue";
	//row.getElementsByClassName('responsable').style.width='100%';
	
	for(i in prof)
	{
		var optio=document.createElement('option');
		optio.value=prof[i].code_professeur;
		optio.text=prof[i].nom+" "+prof[i].prenom;
		row.getElementsByClassName('responsable')[0].add(optio);
		
	}
	var cell = row.insertCell(-1);
	cell.innerHTML="<input type='number' class='ects' value='0' min='0' oninput='calc(this.parentElement.parentElement)'/>"
	cell.className="ue";
	//color(semestre);
	
	header=UE.insertRow(-1);
	cell=header.insertCell(-1);
		cell.innerHTML="Sous-UE";
		;
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
	cell.innerHTML="<i class='fa fa-trash ' onclick='deletemat(this.parentElement.parentElement)'>    </i>  ";
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