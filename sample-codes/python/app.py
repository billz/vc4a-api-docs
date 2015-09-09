from flask import Flask
from flask import render_template
import requests
from requests.auth import HTTPDigestAuth
import json

app = Flask(__name__)

__url = 'http://api.frapi/v1'



@app.route('/')
def index():
    return render_template('index.html')



@app.route('/get/ventures')
def ventures():
	url = '%s/ventures.json'%(__url)
	payload = {'offset':'0', 'limit':'40'}
	response = requests.get(url, auth=HTTPDigestAuth('ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'), params=payload)
	return render_template('ventures.html', data=json.loads(response.content))


@app.route("/get/venture/<int:venture_id>")
def venture(venture_id, response=None):
	if venture_id:
		url = '%s/venture/%s.json'%(__url, venture_id)
		response = requests.get(url, auth=HTTPDigestAuth('ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'))
	return render_template('venture.html', data=json.loads(response.content))



@app.route("/get/venture/<int:venture_id>/activity")
def venture_activity(venture_id):
	if venture_id:
		pass
		url = '%s/venture/%s/activity.json'%(__url, venture_id)
		response = requests.get(url, auth=HTTPDigestAuth('ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'))
	return render_template('activity.html', data=json.loads(response.content))
    



@app.route("/get/venture/<int:venture_id>/team")
def venture_team(venture_id):
	if venture_id:
		pass
		url = '%s/venture/%s/team.json'%(__url, venture_id)
		response = requests.get(url, auth=HTTPDigestAuth('ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'))
		print response.content
	return render_template('team.html', data=json.loads(response.content))



@app.route("/venture/search")
def venture_search():
	url = '%s/venture/search.json'%(__url)
	payload = {'offset':'0', 'limit':'40', 'name':'amazing'}
	response = requests.get(url, auth=HTTPDigestAuth('ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'), params=payload)
	print response
	return render_template('search.html', data=json.loads(response.content))

if __name__ == "__main__":
    app.run(debug=True)