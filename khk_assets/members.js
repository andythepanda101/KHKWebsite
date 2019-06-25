// this script dynamically loads in all of the members
(function($) {
    load_members("members.json", $("#members"), $);
})(jQuery)

// makes the ajax requests that will get the info from members.json
// member_section should be where all the member objects are appended to
function load_members(filename, member_section, $) {
  var requestURL = filename;

  var callback = function(data) {
    var members = JSON.parse(data.responseText);
    // TODO: sort members by beta number and title first
    // for each member in the member array, make a member from them
    $.each(members["members"], function (i, val) {
      member_section.append(make_member(val));
    });
  };

  $.ajax({
    url: requestURL,
    complete: callback,
    datatype: "json",
    async: true,
  });
}

// takes a single member and returns the tranlated html, not elegent but works
function make_member(jsonObj) {
  var name = jsonObj["name"];
  var title = jsonObj["title"];
  var bn = jsonObj["bn"];
  var year = jsonObj["year"];
  var major = jsonObj["major"];
  var chair = jsonObj["chair"];
  var image = jsonObj["image"];
  var bio = jsonObj["bio"]
  if (bio) bio = bio.replace(/"/g, '\'');

  var section = document.createElement("section");

  var a = document.createElement("a");
  a.setAttribute("class", "image side");
  var img = document.createElement("img");
  img.setAttribute("src", "images/khkpics/" + image);
  a.append(img);
  section.append(a);

  var h2 = document.createElement("h2");
  h2.innerText = name;
  var h3 = document.createElement("h3");
  h3.innerText = title;
  section.append(h2);
  section.append(h3);

  var p = document.createElement("p");
  p.innerHTML = `
    <b>Beta Number: </b>` + bn +`<br/>
    <b>Year: </b>` + year + `<br/>
    <b>Major: </b>` + major + `<br/>
    <b>Chair(s): </b>` + chair + `<br/>
  `;
  section.append(p);

  var button = document.createElement("a");
  button.setAttribute("class", "button scrolly");
  button.setAttribute("onclick", "alert(\"" + bio + "\")");
  button.innerText = "More";
  section.append(button);

  return section;
}
