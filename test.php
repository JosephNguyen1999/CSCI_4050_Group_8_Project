<!DOCTYPE html>
<html>
  
<head>
  <title>Send Mail</title>
  <script src=
    "https://smtpjs.com/v3/smtp.js">
  </script>
  
  <script type="text/javascript">
    function sendEmail() {
      Email.send({
        Host: "smtp.gmail.com",
        Username: "TheBookStore999@gmail.com",
        Password: "esuzhiwrpgablkmk",
        To: 'TheBookStore999@gmail.com',
        From: "TheBookStore999@gmail.com",
        Subject: "Sending Email using javascript",
        Body: "Well that was easy!!",
      })
        .then(function (message) {
          alert("mail sent successfully")
        });
    }
  </script>
</head>
  
<body>
  <form method="post">
    <input type="button" value="Send Email" 
        onclick="sendEmail()" />
  </form>
</body>
  
</html>