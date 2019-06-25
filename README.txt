Website for Beta chapter of Kappa Eta Kappa fraternity.

To test the site locally, go to the directory with a command line and type:
		python -m http.server
This will only work if you have python3 installed

Theoretically the only thing that needs to change to maintain the website is two places:
1. members.json contains all of the info to populate the section showing all the members
2. login.js has a hard coded list of all the emails that are allowed to login
3. login.php updates member profiles when they send requests. It can't add new members though

Credits:

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
