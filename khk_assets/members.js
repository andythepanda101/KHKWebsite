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
    // for each member in the member array, make a member from them
    $.each(members["members"], function (i, val) {
      member_section.append(make_member(val));
      console.log(val["email"]);
    });
  };

  $.ajax({
    url: requestURL,
    complete: callback,
    datatype: "json",
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
  var html = $(`<section>
                  <a class='image side'><img src='images/khkpics/` + image + `.jpg'/></a>
                  <h2>` + name + `</h2>
                  <h3>` + title + `</h3>
                  <br/>
                  <p>
                    <b>Beta Number: </b>` + bn +`<br/>
                    <b>Year: </b>` + year + `<br/>
                    <b>Major: </b>` + major + `<br/>
                    <b>Chair(s): </b>` + chair + `<br/>
                  </p>
                </section>`);
  return html;
}
