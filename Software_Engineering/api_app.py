from flask import Flask, request, jsonify
from datetime import datetime
import mysql.connector
import db_config
import requests
import json

app = Flask(__name__)

mydb = mysql.connector.connect(
    host=db_config.host,
    user=db_config.user,
    password=db_config.password,
    database=db_config.database
)

mycursor = mydb.cursor()


@app.route('/')
def welcome():
    return "Hello world , this is the API speaking "


# creates a table in db

@app.route('/db_table')
def db_table():
    mycursor.execute("CREATE TABLE `earthquake_tracker`.`earthquakes` (`id` INT NOT NULL AUTO_INCREMENT , `mag` FLOAT NOT NULL , `place` TEXT NOT NULL , `time` BIGINT NOT NULL , `url` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ")
    mycursor.execute("ALTER TABLE `earthquakes` ADD `longitude` FLOAT NOT NULL AFTER `url`, ADD `latitude` FLOAT NOT NULL AFTER `longitude`, ADD `depth` FLOAT NOT NULL AFTER `latitude`, ADD `alert` TEXT NOT NULL AFTER `depth`; ")
    mydb.commit()
    return 'created table'

# post an eq in db


@app.route('/api/insert', methods=['POST'])
def post_eq():
    mag = request.json['mag']
    place = request.json['place']
    time = request.json['time']
    url = request.json['url']
    longitude = request.json['longitude']
    latitude = request.json['latitude']
    depth = request.json['depth']
    alert = request.json['alert']

    sql = "INSERT INTO `earthquakes` (mag, place, time, url, longitude, latitude, depth, alert) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
    val = [mag, place, time, url, longitude, latitude, depth, alert]

    mycursor.execute(sql, val)
    mydb.commit()
    return "record inserted"

# method for inserting multiple earthquakes to the db with one request


@app.route('/api/insert_eqs', methods=['POST'])
def post_many_eq():
    val = []

    for i in range(len(request.json['features'])):
        mag = request.json['features'][i]['mag']
        place = request.json['features'][i]['place']
        time = request.json['features'][i]['time']
        url = request.json['features'][i]['url']
        longitude = request.json['features'][i]['longitude']
        latitude = request.json['features'][i]['latitude']
        depth = request.json['features'][i]['depth']
        alert = request.json['features'][i]['alert']
        val.append((mag, place, time, url, longitude, latitude, depth, alert))

    sql = "INSERT INTO earthquakes (mag, place, time, url, longitude, latitude, depth ,alert) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"

    mycursor.executemany(sql, val)
    mydb.commit()
    return f"{mycursor.rowcount} records inserted"


# Get only one eq from db

@app.route('/api/get_eq/<int:id>', methods=['GET'])
def get_eq(id):

    cursor = mydb.cursor(dictionary=True)
    cursor.execute(f"SELECT * FROM `earthquakes` WHERE ID={id}")
    data = cursor.fetchall()[0]

    # Converts the unix timestamp to formated string
    dt = datetime.fromtimestamp(data['time']/1000)  # converts ms to sec
    date = dt.strftime("%Y-%m-%d %H:%M:%S")

    data['time'] = date

    return jsonify(data)


# Get all the eqs from db

@app.route('/api/get_all_eq', methods=['GET'])
def get_all_eq():

    cursor = mydb.cursor(dictionary=True)
    cursor.execute("SELECT id, mag, place, time, url FROM earthquakes")
    data = cursor.fetchall()

    for i in range(len(data)):  # Converts the unix timestamps to formated strings
        data_i = data[i]
        dt = datetime.fromtimestamp(data_i['time']/1000)  # converts ms to sec
        date = dt.strftime("%Y-%m-%d %H:%M:%S")

        data_i['time'] = date

    return jsonify(data)


# Count the eqs in db

@app.route('/api/cnt_eq', methods=['GET'])
def cnt_eq():

    mycursor.execute("SELECT COUNT(*) FROM `earthquakes`")

    return str(mycursor.fetchone()[0])

# Delete an eq


@app.route('/api/delete_eq/<int:id>', methods=['GET'])
def delete(id):

    mycursor.execute(f"DELETE FROM `earthquakes` WHERE ID={id}")
    mydb.commit()
    return "record deleted"

# Drops a table from db


@app.route('/drop_table', methods=['GET'])
def drop_table():

    mycursor.execute("DROP TABLE IF EXISTS `earthquakes` ")
    mydb.commit()
    return "table droped"


if __name__ == "__main__":
    app.run(debug=True, port=5000)
