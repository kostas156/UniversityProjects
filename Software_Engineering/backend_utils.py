from datetime import datetime
import requests
import json


def get_and_verify_json(source_url="https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson"):
    try:
        r = requests.get(source_url)
    except Exception as e:
        return f"Exception while geting json of type: {e}"

    # Check if the request was successful
    if r.status_code != 200:
        return f"error while fetching json, status code: {r.status_code}"

    # Rudimentary validation of the received json
    if "features" not in r.json().keys():
        return "received json has no key 'features'"

    return r.json()


def parse_and_verify_json(geojson_data):
    try:
        json_data = json.loads(geojson_data)
        if "features" not in json_data.keys():
            return "received json has no key 'features'"
        return json_data
    except Exception as e:
        return f"Exception while parsing json of type: {e}"


def geojson_to_features(geojson):
    features = []
    for i in range(len(geojson["features"])):
        feature = geojson["features"][i]

        # Null check for alert property
        alert = feature["properties"]["alert"]
        if alert == None:
            alert = "NaN"

        # for each earthquake in the received json, create the respective feature with the necessary data
        features.append({
            "mag": feature["properties"]["mag"],
            "place": feature["properties"]["place"],
            "time": feature["properties"]["time"],
            "url": feature["properties"]["url"],
            "alert": alert,
            "longitude": feature["geometry"]["coordinates"][0],
            "latitude": feature["geometry"]["coordinates"][1],
            "depth": feature["geometry"]["coordinates"][2]})

    return features


def insert_earthquake(mag, place, time, url, alert, longitude, latitude, depth):
    api_url = "http://localhost:5000/api/insert"
    json_data = {"mag": mag, "place": place, "time": time, "url": url,
                 "alert": alert, "longitude": longitude, "latitude": latitude, "depth": depth}

    try:
        r = requests.post(api_url, json=json_data)
    except Exception as e:
        return f"Exception while posting to the API, {e}"

    # return a tuple with the status code and text of the response
    return (r.status_code, r.text)


def insert_earthquakes(features, replace=False):
    api_root_url = "http://localhost:5000"
    json_data = {"features": features}

    if replace:
        try:
            requests.get(f"{api_root_url}/drop_table")
            requests.get(f"{api_root_url}/db_table")
        except Exception as e:
            return f"Exception while recreating the database table via the API, {e}"

    try:
        r = requests.post(f"{api_root_url}/api/insert_eqs", json=json_data)
    except Exception as e:
        return f"Exception while posting to the API, {e}"

    # return a tuple with the status code and text of the response
    return (r.status_code, r.text)


def get_api_features():
    api_root_url = "http://localhost:5000"

    try:
        r = requests.get(f"{api_root_url}/api/get_all_eq")
    except Exception as e:
        return f"Exception while getting earthquakes from the API, {e}"

    features = []
    for f in r.json():
        f.pop('id')
        features.append(f)

    return features


# Compares a list of features with the ones in the DB
# and returns the features that are not already in the DB
def get_new_features(new_features):
    current_features = get_api_features()

    features = []
    for nf in new_features:
        found = False
        for cf in current_features:
            matching_properties = 0

            for k in cf.keys():
                if k == "time":
                    nf_time = dt = datetime.fromtimestamp(
                        nf['time']/1000)  # converts ms to sec
                    date = dt.strftime("%Y-%m-%d %H:%M:%S")
                    if date == cf["time"]:
                        matching_properties += 1
                    continue
                if nf[k] == cf[k]:
                    matching_properties += 1

            # print(f"Matching properties: {matching_properties}")
            # if matching_properties > 0: print(f"{nf}\n{cf}")
            if matching_properties == len(cf.keys()):
                found = True
                break

        if not found:
            features.append(nf)

    return features
