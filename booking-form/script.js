/* Airport JSON list */
var options = {
  shouldSort: true,
  threshold: 0.4,
  maxPatternLength: 32,
  keys: [{
    name: 'iata',
    weight: 0.5
  }, {
    name: 'name',
    weight: 0.3
  }, {
    name: 'city',
    weight: 0.2
  }]
};

var fuse = new Fuse(airports, options)


var ac = $('#autocomplete')
  .on('click', function(e) {
    e.stopPropagation();
  })
  .on('focus keyup', search)
  .on('keydown', onKeyDown);

var wrap = $('<div>')
  .addClass('autocomplete-wrapper')
  .insertBefore(ac)
  .append(ac);

var list = $('<div>')
  .addClass('autocomplete-results')
  .on('click', '.autocomplete-result', function(e) {
    e.preventDefault();
    e.stopPropagation();
    selectIndex($(this).data('index'));
  })
  .appendTo(wrap);

$(document)
  .on('mouseover', '.autocomplete-result', function(e) {
    var index = parseInt($(this).data('index'), 10);
    if (!isNaN(index)) {
      list.attr('data-highlight', index);
    }
  })
  .on('click', clearResults);

function clearResults() {
  results = [];
  numResults = 0;
  list.empty();
}

function selectIndex(index) {
  if (results.length >= index + 1) {
    ac.val(results[index].iata);
    clearResults();
  }  
}

var results = [];
var numResults = 0;
var selectedIndex = -1;

function search(e) {
  if (e.which === 38 || e.which === 13 || e.which === 40) {
    return;
  }
  
  if (ac.val().length > 0) {
    results = _.take(fuse.search(ac.val()), 7);
    numResults = results.length;
    
    var divs = results.map(function(r, i) {
        return '<div class="autocomplete-result" data-index="'+ i +'">'
             + '<div><b>'+ r.iata +'</b> - '+ r.name +'</div>'
             + '<div class="autocomplete-location">'+ r.city +', '+ r.country +'</div>'
             + '</div>';
     });
    
    selectedIndex = -1;
    list.html(divs.join(''))
      .attr('data-highlight', selectedIndex);

  } else {
    numResults = 0;
    list.empty();
  }
}

function onKeyDown(e) {
  switch(e.which) {
    case 38: // up
      selectedIndex--;
      if (selectedIndex <= -1) {
        selectedIndex = -1;
      }
      list.attr('data-highlight', selectedIndex);
      break;
    case 13: // enter
      selectIndex(selectedIndex);
      break;
    case 9: // enter
      selectIndex(selectedIndex);
      e.stopPropagation();
      return;
    case 40: // down
      selectedIndex++;
      if (selectedIndex >= numResults) {
        selectedIndex = numResults-1;
      }
      list.attr('data-highlight', selectedIndex);
      break;

    default: return; // exit this handler for other keys
  }
  e.stopPropagation();
  e.preventDefault(); // prevent the default action (scroll / move caret)
}

/* Airlines Array list */
const airlines = ["ITA Airways", "AirFrance", "KLM", "Luftansa", "Ryanair", "GoAir"];

/* Flight & Airport Data */
let SearchFlight = function() {
  this.tripType = document.searchFlight.radioOneWay.checked ? "One Way" : "Round Trip";
  this.searchResult = [];
  this.formData = {};
  /* Form input Dats */
  this.getFormData = function() {
    this.formData = {
      fromPlace: document.searchFlight.fromPlace.value,
      toPlace: document.searchFlight.toPlace.value,
      travelDate: document.searchFlight.travelDate.value,
      dateOfReturn: document.searchFlight.dateOfReturn.value,
      noOfTravelers: document.searchFlight.noOfTravelers.value,
    }
  };
  /* One Way & Round Trip Check */
  this.showHideRoundTrip = function() {
    for(var i = 0; i < document.searchFlight.trip.length; i++) {
      document.searchFlight.trip[i].addEventListener("click", () => {
        if(!document.searchFlight.radioOneWay.checked) {
          document.getElementById("returnDate").style.display = "block";  
          this.tripType = "Round Trip";
        }
        else {
          document.getElementById("returnDate").style.display = "none";
          this.tripType = "One Way";
        }
      })
    }
  };
  /* Rendering Airport Result */
  this.renderResult = function(element) {
    let getChildNode = element.parentNode.childNodes;
    let appendList = this.searchResult.map((k,i) => {
      if(this.searchResult.length > 0) {
        let list = document.createElement("li");
        list.innerHTML = k;
        return list; 
      }
    });
    for(let i = 0; i < getChildNode.length; i++) {
      if(getChildNode[i].tagName === "UL") {
        getChildNode[i].style.display = "block";
        getChildNode[i].innerHTML = "";
        for(let j = 0; j < appendList.length; j++) {
          getChildNode[i].appendChild(appendList[j]);
        }

        function getEventTarget(e) {
          e = e || window.event;
          return e.target || e.srcElement; 
        }
        getChildNode[i].onclick = function(event) {
          let target = getEventTarget(event);
          element.value = target.innerHTML;
          getChildNode[i].innerHTML = "";
          getChildNode[i].style.display = "none";
        };
      }
    };
  };
  /* Airport Filtered Values */
  this.airportAutoSuggestion = function(event) {
    let enteredInput = event.target.value;
    let keywordFilter = [];
    let uniqueArray = [];
    let autoSuggestionResult = airportSearch.filter(function(k,i){
      k.keyword.filter(function(place,index){
        let changeJSONCase = place.toLowerCase();
        let changeInputCase = enteredInput.toLowerCase();
        if(changeJSONCase.indexOf(changeInputCase) > -1) {
          return keywordFilter.push(k.location);
        }
      });
      for(var value of keywordFilter){
        if(uniqueArray.indexOf(value) === -1){
          uniqueArray.push(value);
        }
      }
      return uniqueArray;
    });
    this.searchResult = event.target.value != "" ? uniqueArray : [];
    if(this.searchResult == "") {
      console.log("Match not found.. Please Enter correct Value");
    }
    this.renderResult(event.target);
  };
  /* Validate Travel Date Check */
  this.validateEnteredDate = function(event) {
    let selectedDate = new Date(event.target.value);
    let now = new Date();
    if (selectedDate <= now) {
      alert("Date must be in the future");
      event.target.value = "";
    }
  };
  /* Validate Number of Travelers */
  this.validateTravelers = function(event) {
    let selectedTravelers = event.target.value;
    if(selectedTravelers > 8) {
      alert("Please Enter Below 8 Travelers");
      event.target.value = "";
    }
  };
  /* Validting Form after Submit Button */
  this.submitValues = ((event) => {
    this.getFormData();
    const {fromPlace, toPlace, travelDate, dateOfReturn, noOfTravelers} = this.formData;
    const {tripType} = this;
    if(fromPlace !== "" && toPlace !== "" && travelDate !== "" && noOfTravelers !== "") {
      if(tripType === "Round Trip" && dateOfReturn === "") {
        alert("Fields can not be empty");
        return false;
      }
      if(fromPlace === toPlace) {
        alert("From and To place cannot be same");
        return false;
      }
      if(tripType === "Round Trip" && dateOfReturn < travelDate) {
        alert("Return Date must not less then One Way");
        return false;
      }
      if(noOfTravelers <= 0 ) {
        alert("Please Choose Minimum 1 Passenger");
        return false;
      }
      //alert("Form filled");
      this.displayValues();
      AirlineDisplay.call(this);
      this.airlinesList();
      let inputArrayCont = [
          {headText: "Flight Name", sorting: false},
          {headText: "Departure", sorting: false},
          {headText: "Arrival", sorting: false},
          {headText: "Fare", sorting: true}
      ];
      let oneWayTable = new CreateTable("table",inputArrayCont,this.tableContent,"showFilter", 0, "One Way");
      oneWayTable.renderTable();
      oneWayTable.filterRow(0);
      oneWayTable.filter();
      if(tripType === "One Way") {
        document.getElementById("showFilterRoundTrip").style.display = "none";
      }
      if(tripType === "Round Trip") {
        this.airlinesList();
        let roundTrip = new CreateTable("table1",inputArrayCont,this.tableContent,"showFilterRoundTrip", 0, "Round Trip");
        roundTrip.renderTable();
        roundTrip.filterRow(0);
        roundTrip.filter();
         document.getElementById("showFilterRoundTrip").style.display = "block";
      }
    }
    else {
      alert("Fields can not be empty");
    }
  });
  /* Displaying Head Values */
  this.displayValues = function() {
    let displayData = {
      beforeSearch: document.getElementsByClassName("beforeSearch")[0],
      flightOnward: document.getElementsByClassName("flightOnward")[0],
      flightReturn: document.getElementsByClassName("flightReturn")[0] 
    };
    const {beforeSearch, flightOnward, flightReturn} = displayData;
    const {tripType, changeValues} = this;
    if(tripType === "One Way") {
      beforeSearch.style.display = "none";
      flightOnward.style.display = "block";
      flightReturn.style.display = "none";
      changeValues("flightOnward",".headStartLoc",".headStartDate",".headEndLoc",".headEndDate");
    }  
    if(tripType === "Round Trip") { 
      beforeSearch.style.display = "none";
      flightOnward.style.display = "block";

      changeValues("flightOnward",".headStartLoc",".headStartDate",".headEndLoc",".headEndDate");
      flightReturn.style.display = "block";
      changeValues("flightReturn",".returnStartLoc",".returnStartDate",".returnEndLoc",".returnEndDate");
    }
  };
  /* Appeding the Renderd Head Values */
  this.changeValues = ((selectedTripType, startLoc, startDate, endLoc, endDate) => {
    this.getFormData();
    const {fromPlace, toPlace, travelDate, dateOfReturn, noOfTravelers} = this.formData;
    let getTripType = document.getElementsByClassName(selectedTripType);
    let getStaringPlace = getTripType[0].querySelector(startLoc);
    let getStartDate = getTripType[0].querySelector(startDate);
    let getEndPlace = getTripType[0].querySelector(endLoc);
    let getEndDate = getTripType[0].querySelector(endDate);

    if(selectedTripType === "flightOnward") {
      getStaringPlace.innerHTML = fromPlace;
      getStartDate.innerHTML = travelDate;
      getEndPlace.innerHTML = toPlace;
      getEndDate.innerHTML = travelDate;
    }
    if(selectedTripType === "flightReturn") {
      getStaringPlace.innerHTML = toPlace;
      getStartDate.innerHTML = dateOfReturn;
      getEndPlace.innerHTML = fromPlace;
      getEndDate.innerHTML = dateOfReturn;
    }
  });
};

/* Airline Details Listing */
let AirlineDisplay = function() {
  this.airlinesResult = {};
  this.getRandomArbitrary = function (min, max, separator = ".", round = false) {
    let getRandomNumber = (Math.random() * (max - min + 1)) + min;
    let value = getRandomNumber.toFixed(2);
    value = value % 1 < 0.60 ? value : Math.floor(getRandomNumber).toFixed(2);
    //value = round ? Math.round(value) : value;
    let replace = value.replace(".", separator);
    return replace;
  }
  this.airlinesList = (() =>{
    //const {airlinesResult, getRandomArbitrary} = this;
    let airlinesList = [];
    this.airlinesResult = {
      flightName: "",
      departureTime: "",
      arrivalTime: "",
      price: ""
    };
    var rand = Math.floor(Math.random() * airlines.length);
    if(rand === 0) { rand += 1}
    this.tableContent = [];
    for(i=0; i<= rand; i++){
      let rowContent = [];
      this.airlinesResult = {
        flightName: airlines[i],
        departureTime: this.getRandomArbitrary(0,24,":"),
        arrivalTime: this.getRandomArbitrary(0,24,":"),
        price: Math.round(this.getRandomArbitrary(1000,6000) * this.formData.noOfTravelers)
      }
      rowContent.push(airlines[i]);
      rowContent.push(this.airlinesResult.departureTime);
      rowContent.push(this.airlinesResult.arrivalTime);
      rowContent.push(this.airlinesResult.price);
      rowContent.push("<input type='button' class='bookTicBtn' value='Book Now' />");
      this.tableContent.push(rowContent)
    }
  });
}

/* Creating Table with Sorting and Filter */
let CreateTable = function(id,thead,tbody,filterId,filterBy,tripType) {
  this.getParentId = document.getElementById(id);
  this.getFilterId = document.getElementById(filterId);
  this.theadContent = thead;
  this.tbodyContent = tbody;
  this.ascendingSort = true;
  this.filteredValue = [];
  this.filterByRow = [];
  let previousFilterCheck;
  this.filterRow = function(index) {
    const {tbodyContent} = this;
    let filter = tbodyContent.map((k, i) => {
      let innerArr = k.filter((j, l) => {
        if(index === l) {
          this.filteredValue.push(j)
          return j
        }
      })
      return innerArr;
    });
  };
  /* Creating Table */
  this.renderTable = (() => {
    const {getParentId, theadContent, tbodyContent} = this;
    getParentId.innerHTML = "";
    let table = document.createElement("TABLE");
    getParentId.appendChild(table);
    let tableHead = document.createElement("THEAD");
    table.appendChild(tableHead);
    let rowHead = document.createElement("TR");
    tableHead.appendChild(rowHead);
    let tableBody = document.createElement("TBODY");
    table.appendChild(tableBody);
    for(let i=0; i< theadContent.length; i++) {
      let content = document.createElement("TH");
      if(theadContent[i].sorting) {
        let icon = document.createElement("I");
        icon.className = "fa fa-long-arrow-up";
        let textNode = document.createTextNode(theadContent[i].headText);
        content.appendChild(textNode);
        content.appendChild(icon);
        content.addEventListener("click", () => {
          this.sorting(i);
        })
      }
      else {
        content.innerHTML = theadContent[i].headText; 
      }
      rowHead.appendChild(content);
    }
    let appendTrow = tbodyContent.map((k,i) => {
      let tr = document.createElement("tr");
      let appendTd = k.map((j,l) => {
        let td = document.createElement("td");
        td.innerHTML = j;
        return td;
      });
      for(let i = 0; i < appendTd.length; i++) {
        tr.appendChild(appendTd[i]); 
      }
      return tr;
    });
    for(let i=0; i<appendTrow.length; i++) {
      tableBody.appendChild(appendTrow[i]); 
    }
  });
  /* Filter Table */
  this.filter = function() {
    const {filteredValue} = this;
    this.getFilterId.innerHTML = "";
    let filterTitle = document.createElement("H4");
    filterTitle.innerHTML = tripType;
    this.getFilterId.appendChild(filterTitle);
    let filterList = filteredValue.map((k,i) => {
      let createList = document.createElement("LI");
      let filterCheckbox = document.createElement("INPUT");
      filterCheckbox.setAttribute("type", "checkbox");
      filterCheckbox.onclick = this.refineTable;
      filterCheckbox.className = "styled-checkbox";
      filterCheckbox.value = k;
      filterCheckbox.id = k+i + "_" + this.getFilterId.id;
      let filterLabel = document.createElement("LABEL");
      filterLabel.setAttribute("for", k+i + "_" + this.getFilterId.id);
      filterLabel.innerHTML = k;
      createList.appendChild(filterCheckbox);
      createList.appendChild(filterLabel);
      return createList;
    });
    let renderList = document.createElement("UL");
    let filterByValue = [];
    for(let i=0; i< filterList.length; i++) {
      renderList.appendChild(filterList[i]);
    }
    this.getFilterId.appendChild(renderList);
  }
  this.refineTable = ((e) => {
    let targetElement = e.target;
    if(targetElement.checked) {
     this.filterByRow.push(e.target.value); 
    }
    else {
      var index = this.filterByRow.indexOf(e.target.value);
      if (index > -1) {
         this.filterByRow.splice(index, 1);
      }
    }
    if(this.filterByRow.length > 0) {
      let rearrangeArray = [];
      let {tbodyContent} = this;
      for(let i = 0; i<this.filterByRow.length; i++) {
        for(let j = 0; j<tbody.length; j++) {
          for(let k = 0; k<tbody[j].length; k++) {
            if(this.filterByRow[i] === tbody[j][k]) {
              rearrangeArray.push(tbody[j])
            }
          }
        }
      }
      this.tbodyContent = rearrangeArray;
    }
    else {
      this.tbodyContent = tbody;
    }
    this.renderTable();
  });
  /* Table Sorting */
  this.sorting = ((index) => {
    let {tbodyContent} = this;
    let getSortedValue = [];
    let getSortOrder = tbodyContent.map((k,i) => {
      let findIndex = k.filter((j,l) => {
        if(index === l) {
          getSortedValue.push(j);
          return j;
        };
      });
      return findIndex;
    });
    if(this.ascendingSort) {
      getSortedValue.sort(function(a, b) {
        return a - b;
      });
      this.ascendingSort = false;
    }
    else {
      getSortedValue.sort(function(a, b) {
        return b - a;
      });
      this.ascendingSort = true;
    }
    let rearrangeArray = [];
    for(let i = 0; i<getSortedValue.length; i++) {
      for(let j = 0; j<tbodyContent.length; j++) {
        for(let k = 0; k<tbodyContent[j].length; k++) {
          if(getSortedValue[i] === tbodyContent[j][k]) {
            rearrangeArray.push(tbodyContent[j])
          }
        }
      }
    }
    this.tbodyContent = rearrangeArray;
    this.renderTable();
  })
}

let flight = new SearchFlight();
flight.showHideRoundTrip();