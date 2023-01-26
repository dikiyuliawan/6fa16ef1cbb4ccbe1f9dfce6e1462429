# Send Email API

# How to set up application

- Cloning git on this repository
- Start Apache & Sql Server (e.g Xampp, Mampp, Wampp, etc)
- Create database : levart
- Create/import table sent_email (file included)

# How to run application

- You need to authorize first before send email
- Enter url **localhost/levart/auth.php** on Postman with POST method
    ![auth](./readme/auth.png)

- Enter url **localhost/levart/restapi.php** on Postman with POST method
    condition if unauthorized
    ![401](./readme/401.png)
    
    successfully sent email
    ![sent_email](./readme/sent_email.png)

- Here's list of messages that successfully sent from api
    ![mailtrap](./readme/mailtrap.png)
