import json
import mysql.connector

with open("centroids.geojson") as f:
    data = json.loads(f.read())

# print(len(data["features"]))
db = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    db = "gravekeeper"
)

cursor = db.cursor()

# table setup
cursor.execute("DELETE FROM grave_record")
cursor.execute("DELETE FROM grave_data")
cursor.execute("ALTER TABLE grave_data AUTO_INCREMENT = 1")

query = "INSERT INTO grave_data (status, grave_no, label, coordinates) VALUES (%s, %s, %s, %s)"

for i, d in enumerate(data["features"], 1):
    
    if(d is None or d["geometry"] is None):
        continue
    
    try:
        label = d["properties"]["SiteName"]
        coordinates = f'Point({d["geometry"]["coordinates"][0]} {d["geometry"]["coordinates"][1]})'
        data = ("vacant", f"{i}", label, coordinates)
        
        # if(i in [10, 50, 100, 1000]):
        #     print(data)

        cursor.execute(query, data)
        print(f"GraveID {i} inserted")
    except Exception as e:
        print(f"GraveID {i} insertion error: {e} - data: {data}")

db.commit()

print(db)