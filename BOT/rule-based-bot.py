import json

# Load data from JSON file
with open('./mit-hc-data.json', 'r') as file:
    data = json.load(file)

doctors_staffs = data['doctors_staffs']
other_staffs = data['other_staffs']    

# Function to handle user queries
def answer_query(query):
    query = query.lower()
    
    for staff in doctors_staffs:
        name = staff.get('name', '').lower()

        if name == query:
            return f"{staff['name']} works from {staff['working_hours']}."

        speciality = staff.get('speciality', '').lower()
        responsibility = staff.get('responsibility', '').lower()
        education_qualification = staff.get('education_qualification', '').lower()

        if speciality == query:
            return f"The doctor responsible for {speciality} is {staff['name']}."

        if 'working hour' in query and name in query:
            return f"The working hours for {staff['name']} are {staff['working_hours']}."

        if name in query and 'available on tuesday' in query:
            if staff['working_hours'].get('Tuesday', '') != 'Off':
                return f"Yes, {staff['name']} will be available on Tuesday."
            else:
                return f"No, {staff['name']} is not available on Tuesday."

        if 'education qualification' in query and name in query:
            return f"The education qualification of {staff['name']} is {staff['education_qualification']}."

        if name in query and 'handle dental patients' in query:
            if staff['handles_dental_patients']:
                return f"Yes, {staff['name']} handles dental patients."
            else:
                return f"No, {staff['name']} does not handle dental patients."

    for staff in other_staffs:
        name = staff.get('name', '').lower()

        if 'contact number' in query and name in query:
            return f"The contact number for {staff['name']} is {staff['contact_number']}."

        if 'name' in query and name in query:
            return f"The name of the {staff['responsibility']} is {staff['name']}."

    return "Sorry, I couldn't understand the question."

# User interaction loop
while True:
    user_input = input("You: ")
    if user_input.lower() == 'exit':
        break
    response = answer_query(user_input)
    print("Chatbot:", response)
