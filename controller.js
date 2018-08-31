// this script dynamically loads in all of the members
(function($) {
    load_members("members.json", $("#members"), $);
})(jQuery)

function load_members(filename, member_section, $) {
  var requestURL = window.location.origin + '/' + filename;
  console.log(requestURL);

  var callback = function(data) {
    var memberText = data.responseText;
    console.log(memberText);
    var members = JSON.parse(memberText);

    $.each(members["members"], function (i, val) {
      var memberhtml = make_member(val);
      member_section.append(memberhtml);
    });
  };

  $.ajax({
    dataType: "json",
    url: requestURL,
    complete: callback,
  });
}

// translates all the json into all of the members
function make_all_members(jsonObj) {

}

// takes a single member and returns the tranlated html
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
                  <p>
                    <b>Beta Number:</b>` + bn +`<br/>
                    <b>Year:</b>` + year + `<br/>
                    <b>Major:</b>` + major + `<br/>
                    <b>Chair(s):</b>` + chair + `<br/>
                  </p>
                </section>`);
  return html;
}
