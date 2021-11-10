var csv = new XMLHttpRequest();

csv.onload = () => {
  // section responsiveness
  let section = document.querySelector("section");
  let part_nav = document.querySelectorAll("#part_nav");
  let li_nav = document.querySelectorAll("#li_nav");
  let main_nav = document.querySelector("#main_nav");
  let pull = document.querySelector("#pull");
  let main = document.querySelector("main");
  let footer = document.querySelector("footer");
  let data_copy = [];
  let available_data =[];
  function show(){
    for (i=0; i<part_nav.length; i++){
      part_nav[i].setAttribute("style", "display: block;  float:none; width:900px");
      //li_nav[i].setAttribute("style", " border-right:0 px solid blue");
    }
    
  }
  function vanish(){
    for (i=0; i<part_nav.length; i++){
      part_nav[i].setAttribute("style", "display: none");

    }
    

  }
  function vanish2(){
    pull.setAttribute("style", "display: none");
  }
  

  window.addEventListener("resize", () => {
    vanish2();
    let width = document.body.clientWidth;
    console.log(width);
    if (width >= 1200) {
      section.setAttribute("style", "columns: 250px 3");
      main.setAttribute("style","	margin-left: 7% ; margin-right: 7%;");
      footer.setAttribute("style","	margin-left: 7% ; margin-right: 7%;");
    }
    else if (width >= 768 && width < 1200) {
      section.setAttribute("style", "columns: 250px 2");
      main.setAttribute("style","	margin-left: 0% ; margin-right: 0%;");
      footer.setAttribute("style","	margin-left: 0% ; margin-right: 0%;");
    }
    else if (width < 768) {
      section.setAttribute("style", "columns: 250px 1");
      main.setAttribute("style","	margin-left: 0% ; margin-right: 0%;");
      footer.setAttribute("style","	margin-left: 0% ; margin-right: 0%;");
    }
    if(width >=1170){
      pull.setAttribute("style", "display: none");
      for (i=0; i< part_nav.length; i++){
        part_nav[i].setAttribute("style","display: inline-block; float:left; border-radius: 1px;" );
        main_nav.setAttribute("style", " border-right:1px solid #ccc");
      }
    }

    if (width < 1170) {
      pull.setAttribute("style", "display: block");
      show();
    }

  })


  // Kombination mit den Elementen <table> <thead> und <tbody> von html schaffen.
  let table = document.querySelector("#table");
  let thead = document.querySelector("#thead");
  let tbody = document.querySelector("#tbody");

  // convert csv to textlines
  let csvText = csv.responseText
  let allTextLines = csv.responseText.split(/\r\n|\n/);

  // Initialisierung der ersten Zeile mit 7 Elementen(Spalten)
     // table-head erstellen
  
  let theadRow = document.createElement("tr");
  //Trennung der 1. Zeile von der csv-Datei durch Komma, Speicherung in ein Array.
  let columnsHead = allTextLines[0].split(",");
  
  for (var k = 0; k < 7; k++) {
      
    let columnItemsSet = document.createElement("th");  
    columnItemsSet.append(columnsHead[k]);
    //Reihenfolge sortieren direkt nach Namen der Länder (alphabetisch)
    if (k == 1) {
       
      //Spitze nach unten als link erstellen
      let top_Down = document.createElement("a");
      top_Down.setAttribute("class", "fas fa-angle-down");
      top_Down.setAttribute("id","topDo");
      top_Down.setAttribute("href","#/");
      top_Down.setAttribute("style", "color: #49c932; margin-left: 4px; margin-top: 2px; text-decoration: none");
      columnItemsSet.append(top_Down);

       //Spitze nach oben
      let top_Up = document.createElement("a");
      top_Up.setAttribute("class", "fas fa-angle-up");
      top_Up.setAttribute("href","#/");
      top_Up.setAttribute("id","topUp");
      top_Up.setAttribute("style", "color: #49c932; margin-left: 3px; margin-top: 2px; text-decoration: none");
      columnItemsSet.append(top_Up);
    }

    theadRow.append(columnItemsSet);
  }
  thead.append(theadRow);

// Implementierung tbody
  for (var m = 1; m < allTextLines.length; m++) {
    let columnsBody1 = allTextLines[m];
    data_copy.push(columnsBody1);
  }
  for (var i=0; i<data_copy.length; i++){
    const rows = data_copy[i].split(",");
    available_data.push(rows);
  }

  for (var m = 0; m <available_data.length; m++) {
  //Trennung der restlichen Zeile von der csv-Datei durch Komma, Speicherung in ein Array.
  //   alterantiv  let columnsBody = allTextLines[m].split(",");
  //Darstellung durch die Werte in die Tabelle-Body
  let tr = document.createElement("tr");
  
    for (var j = 0; j < 7; j++) {
      let td = document.createElement("td");
      td.setAttribute("id","ff");
      td.append(available_data[m][j]);
      tr.append(td);
    }

   //gerade Zeilen werden grau 
  if (m%2==0){
    tr.setAttribute("style","background-color: #e0e0e0");
  }
  tbody.append(tr);
  }


  document.querySelector("#topDo").addEventListener('click',() => {
  section.setAttribute("style"," color: red");
  });
  document.querySelector("#topUp").addEventListener('click',() => {
    section.setAttribute("style"," color:black");
  });


/*

  // Die funktioniert nicht ganz.
  function maketable(){
    for (var m = 1; m < allTextLines.length; m++) {
      let columnsBody1 = allTextLines[m];
      data_copy.push(columnsBody1);
    }
    for (var i=0; i<data_copy.length; i++){
      const rows = data_copy[i].split(",");
      available_data.push(rows);
    }
  }  
  function sorting(){
    if (sorted == true){
      available_data.sort((r1, r2) => r2[1].localeCompare(r1[1]));
    }else{
      data_copy.sort((r1, r2) => r1[1].localeCompare(r2[1]));
    }
  }
*/
}

csv.open("get", "world_data_v1.csv", true);
csv.overrideMimeType("text/plain"); // make Firefox parse the textfile as a plain text
csv.send();
