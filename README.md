# Exam Portal
Exam Portal is a web portal to conduct MCQ exams

Exam Portal provides following features:
- Admin side
- Create exam.
- Map Questions to exam
- Map options to questions and select correct option
- Schedule exam on particular date and time
- Publish exam for students to register

- Student side 
- Register For exam
- Attempt registered exam
- View score along with correct and wrong answer

- Application is configured to send email on exam registeration
- Application is configured to send email to students with their score and rank

Steps to setup:
- clone the repo
- update env file with db credentials, mail server credentials
- update bootstrap.js base_url variable with application url
- run composer install
- npm install
- npm run dev
