from flask import  Flask, render_template
import requests
import mysql.connector
from requests.api import request
import db_config
import json
from datetime import datetime
import api_app

app = Flask(__name__)

@app.route("/")
def homepage():

    myresult = requests.get("http://127.0.0.1:5000/api/get_eq/1")

    return render_template('homepage.html', list_header="Homepage", earthquakes=myresult.json())

#Route to main Page and Request to api for all earthquakes and their main attributes
@app.route("/table")
def table_page():
    myresult = requests.get('http://127.0.0.1:5000/api/get_all_eq')
    linktext = "http://127.0.0.1:5001"
    
    return render_template('main_page.html', list_header="Last month's earthquakes" , earthquakes=myresult.json())

#Route for each earthquake and more attributes for each one
@app.route("/table/<int:id>")
def show_eq_data(id):
    url = f"http://127.0.0.1:5000/api/get_eq/{id}"
    myresult = requests.get(url)
    eq_num = requests.get("http://127.0.0.1:5000/api/cnt_eq")
    eq_num = int(eq_num.text)

    return render_template('eq_page_temp.html', list_header=f"Earthquake with ID={id}" , earthquakes=myresult.json(), eq_num=eq_num)

@app.route("/about")
def about_page():
    eq_num = requests.get("http://127.0.0.1:5000/api/cnt_eq")
    eq_num = int(eq_num.text)

    return render_template('about.html', list_header="About this website" , eq_num=eq_num)

if __name__ == "__main__":
    app.run(port=5001)
