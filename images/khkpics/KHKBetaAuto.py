def makeMember(name, BN, year, major, chair, bio):
    if name == "Samuel Swanson":
        image = "images/members/&Goose.JPG"
    else:
        image = "images/members/&" + name.split(" ")[0] + ".JPG"
    return    """<div class="member"><div class="leftmost"><img width="270" class="displayed" src="{0}" /></div><div align="right" font="12" class="rightmost"><p align="left">Name: {1}<br />  Beta Number: {2}<br />Year: {3}<br />  Major: {4}<br />  Chair(s): {5}<br />Bio: {6} </p></div></div>""".format(image, name, BN, year, major, chair, bio)

def makeE(ls):
    # second thing in tuple in beta number for ordering
    return [makeMember(ls[0], ls[1], ls[2], ls[3], ls[4], ls[5]), ls[1], ls[0]]

def make(s):
    return makeE(s.split("\t"))

def makeBig(ss):
    html = map(make, ss.split("\n"))
    html = sorted(html, key = lambda x: (ExecTest(x[0]), x[1]))
    print("\n\n\n"); print(list(map(lambda x: x[2], html)))
    html = map(lambda x: x[0], html)
    html = map(addTitle, html)
    html = map(lambda x: x.replace("\\", ""), html)
    html = "\n\n".join(html)
    print("\n\n" + html)

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

def addTitle(string):
    titles = ["<h2>President</h2>", "<h2>Vice President</h2>",
              "<h2>Secretary</h2>", "<h2>Treasurer</h2>", ""]
    return titles[ExecTest(string)] + " " + string
    
