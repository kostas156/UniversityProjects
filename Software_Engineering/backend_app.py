from flask import Flask, request, send_from_directory
import backend_utils

app = Flask(__name__)


@app.route("/import_url", methods=["GET", "POST"])
def import_url():

    if request.method == "GET":
        return send_from_directory("static", "backend_form.html")

    source_url = request.form.get("source_url")
    geojson_data = request.form.get("geojson_data")
    action = request.form.get("action")

    if action == None or action == "":
        return f"Invalid request type: {action}"

    if (source_url == None or source_url == "") and (action[-3:] == "url"):
        return "source url was null or empty"

    if (geojson_data == None or geojson_data == "") and (action[-4:] == "json"):
        return "GeoJson data was null or empty"

    if action[-3:] == "url":
        json_data = backend_utils.get_and_verify_json(source_url)
    elif action[-4:] == "json":
        json_data = backend_utils.parse_and_verify_json(geojson_data)
    else:
        return f"Invalid request type: {action}"

    # if received_json does not contain a dict, there was an error while fetching the json data
    # and an error message was returned instead by get_and_verify_json
    if type(json_data) != dict:
        print(f"received_json type: {type(json_data)}")
        return f"Error, received ({type(json_data)}): {json_data}"

    features = backend_utils.geojson_to_features(json_data)

    print(f"action: {action}")
    if action[:7] == "replace":
        response = backend_utils.insert_earthquakes(features, replace=True)
    elif action[:7] == "add_new":
        features = backend_utils.get_new_features(features)
        if len(features) == 0:
            return "No new earthquakes"
        response = backend_utils.insert_earthquakes(features, replace=False)
    elif action[:3] == "add":
        response = backend_utils.insert_earthquakes(features, replace=False)
    else:
        return f"Invalid request type: {action}"

    return str(response)+"<br><a href=\"/import_url\">Go back</a>"


@app.route("/")
def hello_world():
    return "<p>Hello, World! This is the backend</p><a href=\"/import_url\">Import from url</a>"


if __name__ == '__main__':
    app.run(debug=True, port=5002)
