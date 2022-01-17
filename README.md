# Exam Portal
Exam Portal is a web portal to conduct MCQ exams

## Exam Portal provides following features:
- ### Admin User
- Create exam.
- Map Questions to exam
- Map choices to questions
- Mark the correct answer ( can be multiple )
- Schedule exam on particular date and time
- Publish exam for students to register

- ### Student User 
- Register For exam
- Attempt registered exam
- View score & rank along with correct and wrong answer.

- Application is configured to send automated emails on exam registration
- Application is configured to send email to students with their score and rank

## Steps to host locally:
1. Clone the repo
2. Update .env file with db credentials, mail server credentials etc
3. Update bootstrap.js base_url variable with application url
4. Run command composer install
5. Run dommand npm install
6. Run command npm run dev

## Screenshots
![image](https://user-images.githubusercontent.com/32196731/149826622-1eff2e82-4b3e-4d83-a688-e53d4adce7e3.png)
![image](https://user-images.githubusercontent.com/32196731/149827342-6598c8ca-38cc-4532-9e21-14093f709681.png)
![image](https://user-images.githubusercontent.com/32196731/149827446-a5e02ac3-6972-42a0-9de2-cf69e5b5057a.png)

