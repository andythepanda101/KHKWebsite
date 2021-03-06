# Website for Beta chapter of Kappa Eta Kappa fraternity.

To test the site locally, go to the directory with a command line and type:

`python -m http.server`

This will only work if you have python3 installed. Then you should be able to access the website from `localhost:8080/` (potentially `localhost:8000` depending on your machine)

Theoretically the only thing that needs to change to maintain the website is two places:
* members.json contains all of the info to populate the section showing all the members
* login.js has a hard coded list of all the emails that are allowed to login
* login.php updates member profiles when they send requests. It can't add new members though

Some things that the website doesn't do that it probably should:
* Webmaster should be able to edit member profiles through UI, not need to dig into json
* Image sizes for members should have uniform heights with nice overflow for extra width
* orginization of the top area isn't ideal
* load times for the non-member sections are affected by loading the JSON member info

## Credits:

Template:
	Hyperspace by HTML5 UP

Icons:
	Font Awesome (fortawesome.github.com/Font-Awesome)

Other:
	jQuery (jquery.com)
	html5shiv.js (@afarkas @jdalton @jon_neal @rem)
	Misc. Sass functions (@HugoGiraudel)
	Respond.js (j.mp/respondjs)
	Skel (skel.io)
