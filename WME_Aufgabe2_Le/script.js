var csv = new XMLHttpRequest();

csv.onload = () => {
  // section responsiveness
  let section = document.querySelector("section")

  window.addEventListener("resize", () => {
    let width = document.body.clientWidth;
    console.log(width);
    if (width >= 1200) {
      section.setAttribute("style", "columns: 250px 3")
    }
    if (width >= 768 && width < 1200) {
      section.setAttribute("style", "columns: 250px 2")
    }
    if (width < 768) {
      section.setAttribute("style", "columns: 250px 1")
    }
  })
  // link table variables to html table
  let table = document.querySelector("#table")
  let thead = document.querySelector("#thead")
  let tbody = document.querySelector("#tbody")

  // convert csv to textlines
  let csvText = csv.responseText
  let allTextLines = csv.responseText.split(/\r\n|\n/);

  // initialise the first seven data points
  // implement table head
  let theadRow = document.createElement("tr")
  let columnsHead = allTextLines[0].split(",")
  for (var i = 0; i < 7; i++) {
    let column = document.createElement("th")
    column.append(columnsHead[i])
    column.setAttribute("class", column.innerText.replace(/ /g,"_"))
    if (i == 1) {
      let angleDown = document.createElement("a")
      angleDown.setAttribute("class", "fas fa-angle-down")
      angleDown.href = "#/"
      angleDown.setAttribute("style", "color: #49c932; margin-left: 4px; margin-top: 2px; text-decoration: none")
      column.append(angleDown)
      let angleUp = document.createElement("a")
      angleUp.setAttribute("class", "fas fa-angle-up")
      angleUp.href = "#/"
      angleUp.setAttribute("style", "color: #49c932; margin-left: 3px; margin-top: 2px; text-decoration: none")
      column.append(angleUp)
    }
    theadRow.append(column)
  }
  thead.append(theadRow)

  // implement table body
  for (var i = 1; i < allTextLines.length; i++) {
    let columnsBody = allTextLines[i].split(",")
    let tBodyRow = document.createElement("tr")
    for (var j = 0; j < 7; j++) {
      let column = document.createElement("td")
      column.append(columnsBody[j])
      tBodyRow.append(column)
    }
    tbody.append(tBodyRow)
  }

  // sort by country: a class reverse is added which will trigger the .reverse in the css file to reverse the order of the columns
  table.querySelector(".fa-angle-down").addEventListener('click',() => {
    if (table.classList.contains('reverse')) {
      table.classList.toggle('reverse');
    }
  });
  table.querySelector(".fa-angle-up").addEventListener('click',() => {
    if (!table.classList.contains('reverse')) {
      table.classList.toggle('reverse');
    }
  });

  /*
  * to show and hide categories a boolean is created for every additional category, which checks if the category is shown(false) or hidden(true)
  * if category is shown, delete all cells in the table row of the given index
  * if category is hidden, insert all cells in the table row of the given index
  * to make sure that the order of the category stays the same, even with hidden categories, I implemented a counter, which will decrement by one for every hidden predecessor(category)
  * the counter for every category starts on the index of the order (with no hidden category)
  */
  let show_and_hide_bar = document.querySelector("#show_and_hide_bar")
  let bool1, bool2, bool3, bool4, bool5
  show_and_hide_bar.addEventListener("click", (event) => {
    // implement index variable to get the index of the order for every category
    let index
    switch (event.target.id) {
      case "birth_rate_per_1000":
        bool1 = !bool1
        if (bool1) {
          for(var k = 0; k < thead.childNodes[0].childElementCount; k++) {
            if (event.target.id == thead.childNodes[0].childNodes[k].className) {
              // assign k (index of thead(order of categories)) to index
              index = k
            }
          }
          thead.childNodes[0].deleteCell(index)
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].deleteCell(index)
          }
        } else {
          thead.childNodes[0].insertCell(2).outerHTML = "<th>" + allTextLines[0].split(",")[2] + "</th>"
          thead.childNodes[0].childNodes[2].setAttribute("class", "birth_rate_per_1000")
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].insertCell(2).innerHTML = allTextLines[i+1].split(",")[2]
          }
        }
        break
      case "cell_phones_per_100":
        bool2 = !bool2
        if (bool2) {
          for(var k = 0; k < thead.childNodes[0].childElementCount; k++) {
            if (event.target.id == thead.childNodes[0].childNodes[k].className) {
              index = k
            }
          }
          thead.childNodes[0].deleteCell(index)
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].deleteCell(index)
          }
        } else {
          let counter = 3
          if (bool1) {
            counter--
          }
          thead.childNodes[0].insertCell(counter).outerHTML = "<th>" + allTextLines[0].split(",")[3] + "</th>"
          thead.childNodes[0].childNodes[counter].setAttribute("class", "cell_phones_per_100")
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].insertCell(counter).innerHTML = allTextLines[i+1].split(",")[3]
          }
          counter = 3
        }
        break
      case "children_per_woman":
        bool3 = !bool3
        if (bool3) {
          for(var k = 0; k < thead.childNodes[0].childElementCount; k++) {
            if (event.target.id == thead.childNodes[0].childNodes[k].className) {
              index = k
            }
          }
          thead.childNodes[0].deleteCell(index)
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].deleteCell(index)
          }
        } else {
          let counter = 4
          if (bool1) {
            counter--
          }
          if (bool2) {
            counter--
          }
          thead.childNodes[0].insertCell(counter).outerHTML = "<th>" + allTextLines[0].split(",")[4] + "</th>"
          thead.childNodes[0].childNodes[counter].setAttribute("class", "children_per_woman")
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].insertCell(counter).innerHTML = allTextLines[i+1].split(",")[4]
          }
          counter = 4
        }
        break
      case "electricity_consumption_per_capita":
        bool4 = !bool4
        if (bool4) {
          for(var k = 0; k < thead.childNodes[0].childElementCount; k++) {
            if (event.target.id == thead.childNodes[0].childNodes[k].className) {
              index = k
            }
          }
          thead.childNodes[0].deleteCell(index)
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].deleteCell(index)
          }
        } else {
          let counter = 5
          if (bool1) {
            counter--
          }
          if (bool2) {
            counter--
          }
          if (bool3) {
            counter--
          }
          thead.childNodes[0].insertCell(counter).outerHTML = "<th>" + allTextLines[0].split(",")[5] + "</th>"
          thead.childNodes[0].childNodes[counter].setAttribute("class", "electricity_consumption_per_capita")
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].insertCell(counter).innerHTML = allTextLines[i+1].split(",")[5]
          }
          counter = 5
        }
        break
      case "gdp_per_capita":
        bool5 = !bool5
        if (bool5) {
          for(var k = 0; k < thead.childNodes[0].childElementCount; k++) {
            if (event.target.id == thead.childNodes[0].childNodes[k].className) {
              index = k
            }
          }
          thead.childNodes[0].deleteCell(index)
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].deleteCell(index)
          }
        } else {
          let counter = 6
          if (bool1) {
            counter--
          }
          if (bool2) {
            counter--
          }
          if (bool3) {
            counter--
          }
          if (bool4) {
            counter--
          }
          thead.childNodes[0].insertCell(counter).outerHTML = "<th>" + allTextLines[0].split(",")[6] + "</th>"
          thead.childNodes[0].childNodes[counter].setAttribute("class", "gdp_per_capita")
          for (var i = 0; i < tbody.childNodes.length; i++) {
            tbody.childNodes[i].insertCell(counter).innerHTML = allTextLines[i+1].split(",")[6]
          }
          counter = 6
        }
        break
    }
  });

}

csv.open("get", "/WME_Aufgabe2_Le/world_data_v1.csv", true);
csv.overrideMimeType("text/plain"); // make Firefox parse the textfile as a plain text
csv.send();
