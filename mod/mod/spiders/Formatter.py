import json
from urlparse import urlparse

class Formatter:
    def __init__(self, slug):
        self.slug = slug
        self.foutIndex = 1

    def dump(self, collection):
        fout = open("fout/"+self.slug+"-p"+str(self.foutIndex)+".json", "w")
        json.dump(collection, fout)
        self.foutIndex +=1

    def rewrite(self, row):
        p = urlparse(row["url"])
        sp = p.path.split("/")

        if "data" not in row:
            return False, row["url"]

        if "item" not in row["data"]:
            return False, row["url"]

        if row["data"]["item"]["label"]=="RPG Item":
            return True, {
                "boardgamegreek_url": row["url"],
                "boardgamegreek_id": row["data"]["item"]["objectid"],
                "slug": sp[-1],
                "original_image": row["image"],
                "thumbnail_images": row["data"]["item"]["images"],
                "links": row["data"]["item"]["links"],
                "title": row["title"],
                "category": "RPG",

                "description": row["description"],
                "stats": row["data"]["item"]["stats"],
                "rankinfo": row["data"]["item"]["rankinfo"],
            }
        elif row["data"]["item"]["label"]=="Video Game":
            return True, {
                "boardgamegreek_url": row["url"],
                "boardgamegreek_id": row["data"]["item"]["objectid"],
                "slug": sp[-1],
                "original_image": row["image"],
                "thumbnail_images": row["data"]["item"]["images"],
                "links": row["data"]["item"]["links"],
                "title": row["title"],
                "category": "VideoGame",

                "description": row["description"],

                "stats": row["data"]["item"]["stats"],
                "rankinfo": row["data"]["item"]["rankinfo"],
            }
        else:
            return True, {
                "boardgamegreek_url": row["url"],
                "boardgamegreek_id": row["data"]["item"]["objectid"],
                "slug": sp[-1],
                "original_image": row["image"],
                "thumbnail_images": row["data"]["item"]["images"],
                "links": row["data"]["item"]["links"],
                "title": row["title"],
                "category": "BoardGame",
                "alternatename": row["data"]["item"]["alternatename"],

                "description": row["description"],
                "yearpublished": row["data"]["item"]["yearpublished"],
                "maxplayers": row["data"]["item"]["maxplayers"],
                "minplayers": row["data"]["item"]["minplayers"],
                "maxplaytime": row["data"]["item"]["maxplaytime"],
                "minplaytime": row["data"]["item"]["minplaytime"],
                "minage": row["data"]["item"]["minage"],

                "official_website": row["data"]["item"]["website"]["url"],
                # "official_website_title": row["data"]["item"]["website"]['title'],

                "stats": row["data"]["item"]["stats"],
                "linkcounts": row["data"]["item"]["linkcounts"],
                "polls": row["data"]["item"]["polls"],
                "rankinfo": row["data"]["item"]["rankinfo"],
            }


if __name__ == "__main__":
    
    filenames = [
        {"fin":"bgg-seed/bgg-1v1.json", "slug":"c1v1"},
        {"fin":"bgg-seed/bgg-1v2.json", "slug":"c1v2"},
        {"fin":"bgg-seed/bgg-2.json", "slug":"c2"},
    ]

    errorUrls = []
    for filename in filenames:
        fin = open(filename["fin"])

        print "======", filename["slug"], "======="
        formt = Formatter(filename["slug"])
        newCollection = []

        index = 0
        for line in fin:
            if index==0:
                index+=1
                continue

            try: 
                s = line.strip().replace('\n', '\\n')
                if s[-1]==",":
                    s = s[:-1]
                success ,row = formt.rewrite(json.loads(s))

                if success:
                    newCollection.append(row)
                else:
                    errorUrls.append(row)
            except Exception as e:
                print e, index

            if index%1000==0:
                print filename["slug"], index
                formt.dump(newCollection)
                newCollection = []
            index+=1

        formt.dump(newCollection)

    print "=== Error: ", len(errorUrls)
    fout = open("fout/error.json", "w")
    json.dump(errorUrls, fout)