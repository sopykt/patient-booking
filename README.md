COMP 2513
==

Assignment 6

Assignment #6 – Database Driven Website

 
Requirements
==

This, the final assignment, exercises your knowledge of database-driven Websites using both client-side and server-side code.

Your challenge is to create a patient booking website for use by the FeelBetter Physiotherapy Clinic.  You must create this website so that it runs on falcon using client-side HTML, javascript, AJAX, JSON, and server-side PHP and database functionality.   The system must be capable of the following functionality:

 1. A user must login using PHP with the following UID=Tom and PWD=t1234 credentials that are validated based on a JSON file read from the server. 

 2. A session must be established and maintained for each logged in user.

 3. Patient records:

    Allow the addition of a new patient record (must be stored in a database table on the server) including:
        Unique patient ID, first name, last name, address, phone number, health card number
    Allow update of any field of a patient record except the unique patient number
    Allow deletion of a patient record

 4. Employee records:

    Allow the addition of a new employee (must be stored in a database table on the server) including:
        Unique employee ID, first name, last name, address, phone number, billing rate
    Allow update of any field of a employee record except the unique employee number
    Allow deletion of a employee record

 5. Appointment records:

    Allow the creation of an new appointment record (must be stored in a database table on the server) including:
        Unique appointment number
        Current date and time (stored in unix format)
        Patient ID – should come from database
        Physiotherapist (employee) ID – should come from database
        Treatment type
        Appointment Date/Time (stored in unix format)
        Appointment duration (you can assume that location of appointments is the same for all)
    Allow update of any field of a employee record except the unique appointment number
    Allow deletion of a appointment record

 6. Can display a list of all patients in alphabetical order of last name

 7. Can display a list of all employees in alphabetical order of last name

 8. Can display a list of all appointments by date and time and in chronological order from the current data and time (older appointments should not display) – showing:

    Physiotherapist name
    Patient name
    Treatment type
    Appointment Date/Time
    Appointment duration
    Calculation of cost of appointment (billing rate of employee * duration)

 9. All entered fields must be validated as being non-empty and checked for appropriate values.

 10. The webpage should have a look and feel of a professional health care clinic – use appropriate images and font.  Add in simple webpages for About, Contact, Services, etc.

Database Population:  After completing your application and testing it on falcon, please wipe the database and then enter the following data using your website's functionality, in the following order.  When we grade your website it should be in the state that results from these entries: 

 Employees: first name, last name, address, phone number, billing rate

 Johnny, Beegood, 123 Goodenough Way Truro NS, 902-543-5432, $60 per hour

 Teri, Broadstreet, Apt 32 Carebear Ave Sackville NB, 506-333-2222, $35 per hour

 Suzanne, Almighty, 2143 Shakey Lane Kentville NS, 902-678-4321, $50 per hour

 Patients: first name, last name, address, phone number, health card number

 Roger, Moore, 14 King St Fredericton NB, 506-901-2534, 234 567 890

 Carol, Ling, Apt 3 1823 Gottingen St Halifax NS, 902-465-3291, 012 345 678

 Orin, Snorkel, RR#6 Antigonish Co NS, 902-324-2221, 987 654 321 

 Appointments: Patient, Employee, Treatment type, Appointment Date, Appointment Time, Appointment duration

 Carol Ling, Suzanne Almighty, foot massage, 2015 Feb 25, 10:00am, 1 hour

 Roger Moore, Teri Broadstreet, hip acupuncture, 2015 May 23, 3:00pm, 1.5 hours

 Carol Ling, Johnny Beegood, leg massage, 2015 May 07, 9:00am, 1 hour

 Orin Snorkel, Suzanne Almighty, back massage, 2015 June 22, 1:00pm, 2 hours

 Carol Ling, Teri Broadstreet, foot massage, 2015 May 23, 2:30pm, 1.0 hours

(C) by Luxing Huang, 2015
