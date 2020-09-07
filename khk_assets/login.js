function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  document.getElementById("sign_out").style.display = "";
  if (validate_email(profile.getEmail())) {
    document.getElementById("edit_member").style.display = "";
    if (document.getElementById("error_msg")) {
      document.getElementById("error_msg").style.display = "none";
    }
    if (document.getElementById("edit_info")) {
      document.getElementById("edit_info").style.display = "";
      lookup_member(profile.getEmail());
    }
  }
  else {
    document.getElementById("bad_email").style.display = "";
  }
}

function validate_email(email) {
  var khk_emails = ['deste017@umn.edu', 'delis020@umn.edu', 'tumax040@umn.edu',
    'egger235@umn.edu', 'ung00001@umn.edu', 'kette061@umn.edu',
    'ahuja028@umn.edu', 'meeha108@umn.edu', 'simps422@umn.edu',
    'koepp058@umn.edu', 'koch0299@umn.edu', 'molen042@umn.edu', 'singh829@umn.edu'];
  return khk_emails.includes(email);
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut();
  document.getElementById("edit_member").style.display = "none";
  document.getElementById("sign_out").style.display = "none";
  if (document.getElementById("edit_info")) {
    document.getElementById("edit_info").style.display = "none";
  }
  if (document.getElementById("error_msg")) {
    document.getElementById("error_msg").style.display = "";
  }
  document.getElementById("bad_email").style.display = "none";
}

function lookup_member(email) {
  var requestURL = "members.json";

  var callback = function(data) {
    var members = JSON.parse(data.responseText);
    // for each member in the member array, make a member from them
    $.each(members["members"], function (i, val) {
      if (val["email"] === email) {
        populate_input(val);
      }
    });
  };

  $.ajax({
    url: requestURL,
    complete: callback,
    datatype: "json",
  });
}

function populate_input(val) {
  var $ = jQuery;
  $("#name").val(val["name"]);
  $("#title").val(val["title"]);
  $("#beta_number").val(val["bn"]);
  $("#year").val(val["year"]);
  $("#major").val(val["major"]);
  $("#chair").val(val["chair"]);
  $("#image").val(val["image"]);
  $("#email").val(val["email"]);
  $("#bio").val(val["bio"]);
}

function previewFile(){
       var preview = document.getElementById('imgPreview'); //selects the query named img
       var file    = document.getElementById('imageFile').files[0]; //sames as here
       var reader  = new FileReader();

       document.getElementById('whichImage').selectedIndex = 1;

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }
