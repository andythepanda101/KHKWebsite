# test if a string contains high ranking things
def ExecTest(string):
    testagainst = string.lower()
    if "president" in testagainst and not "vice" in testagainst:
        return 0
    if "vice" in testagainst:
        return 1
    if "secretary" in testagainst:
        return 2
    if "treasurer" in testagainst:
        return 3
    return 4


#returns the beta number of a member
def getBetaNumber(member_info):
    return int(member_info.split("\t")[1])


#takes tab seperated info and returns HTML version
def generateHTML(member_info):
    name, BN, year, major, chair, bio = member_info.split("\t")
    image = "images/khkpics/&" + name.split(" ")[0] + ".jpg"
    if "wanson" in name:
        image = "images/khkpics/&Goose.jpg"
    # generate the actual HTML
    result = """<section>\n <a class="image side"><img src="{}"/></a>\n""".format(image)
    result += """  <h2>{}</h2>\n""".format(name)

    titles = ["  <h3>President</h3>\n", "  <h3>Vice President</h3>\n",
              "  <h3>Secretary</h3>\n", "  <h3>Treasurer</h3>\n", ""]
    result += titles[ExecTest(chair)]

    body= """   <b>Beta Number:</b> {} <br/>\n""".format(BN)
    body+= """   <b>Year:</b> {} <br/>\n""".format(year)
    body+= """   <b>Major:</b> {} <br/>\n""".format(major)
    if not "NULL" in chair:
        body+= """   <b>Chair(s):</b> {} <br/>\n""".format(chair)
    #body+= """Bio: {} <br/>\n"""

    result += """  <p>\n{}  </p>\n</section>""".format(body)

    return result


#takes sheet of info and returns HTML version
def generateFull(member_sheet):
    members = member_sheet.split("\n")
    sorted_members = sorted(members, key = lambda x: (ExecTest(x), getBetaNumber(x)))
    html_list = map(generateHTML, sorted_members)
    close = "\n\n".join(html_list)
    return "\n\t\t".join(close.split('\n'))
