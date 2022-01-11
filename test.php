<?php
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if (isset($_POST['name'])) {
    $mail = new PHPMailer(true);
    $mail->CharSet = "utf-8";
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.mail.ru';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'test_account_for_job@mail.ru';                     
    $mail->Password   = 'Em7zWTRUXTuR1e4ck8GR';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;            
    $mail->setFrom('test_account_for_job@mail.ru', 'Лилия Камалетдинова');
    $mail->addAddress('join@ecwid.com');
    $mail->isHTML(true);
    $mail->Subject = 'Решение тестового задания';
    $mail->Body    = "Добрый день! Данное письмо является ответом на Ваше тестовое задание. 
                    <table border = '1'>
                        <tr><td>Имя</td><td>{$_POST['name']}</td></tr>
                        <tr><td>E-mail</td><td>{$_POST['email']}</td></tr>
                        <tr><td>Телефон</td><td>{$_POST['phoneNumber']}</td></tr>
                        <tr><td>Дата рождения</td><td>{$_POST['birthDate']}</td></tr>
                        <tr><td>Вопрос</td><td>{$_POST['someText']}</td></tr>
                    </table>
                    Ссылка на git репозиторий проекта: 
                    ";

    if($mail->send())echo "<script type='text/javascript'>alert('Сообщение отправлено.');</script>";
    else
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .myFormStyle { 
                display: flex;
                flex-direction: column;
                overflow: hidden auto;
                background: #fff;
                max-width: 600px;
                width:70%;
                margin: 5% auto;
                padding: 5px 20px 13px 20px;
                border: 10px solid #0f6fc5;
                position: relative;
                /*--CSS3 CSS3 Тени для Блока--*/
                -webkit-box-shadow: 0px 0px 20px #000;
                -moz-box-shadow: 0px 0px 20px #000;
                box-shadow: 0px 0px 20px #000;
                /*--CSS3 Закругленные углы--*/
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
            }
            .forInput {
                width: -moz-available;
            }
            .forTableTd {
                padding: 1%;
            }
            span{
                color: red;
            }
        </style>
    </head>
    <body>
        <script>
            function checkInputs() {
                var error="";
                if(document.getElementById("name").value=="") error+="Заполните обязательное поле: Имя.\n";
                if(document.getElementById("email").value=="") error+="Заполните обязательное поле: E-mail.\n";
                if(document.getElementById("phoneNumber").value=="") error+="Заполните обязательное поле: Телефон.\n";
                if(document.getElementById("dirthDate").value=="") error+="Заполните обязательное поле: Дата рождения.\n";
                if(document.getElementById("someText").value=="") error+="Заполните обязательное поле: Вопрос.\n";
                if(error) alert(error);
                else
                {
                    document.forms.testForm.submit();
                }
            }
        </script>
        <div class="myFormStyle">
            <h3><center>Тестовая форма</center></h3>
                <form method="POST" name="testForm" id="testForm">
                <h4>
                    <table border = "0" align = "center">
                        <tr><td align="right" widht="30%" class="forTableTd">Имя<span>*</span></td><td align="left" width="70%"><input type="text" id="name" name="name" class="forInput"></td></tr>
                        <tr><td align="right" widht="30%" class="forTableTd">E-mail<span>*</span></td><td align="left" width="70%"><input type="text" id="email" name="email" class="forInput"></td></tr>
                        <tr><td align="right" widht="30%" class="forTableTd">Телефон<span>*</span></td><td align="left" width="70%"><input type="text" id="phoneNumber" name="phoneNumber" class="forInput"></td></tr>
                        <tr><td align="right" widht="30%">Дата рождения<span>*</span></td><td align="left" width="70%"><input type="date" id="dirthDate" name="birthDate" max="<?php echo date('Y-m-d'); ?>"/></td></tr>
                        <tr><td align="right" widht="30%" class="forTableTd">Вопрос<span>*</span></td><td align="left" width="70%"><input type="text" id="someText" name="someText" class="forInput"></td></tr>
                    </table>
                </h4>
                    <p>Поля отмеченные звёздочкой обязательны для заполнения.</p>
                    <center><input type="button" value="Отправить заявку" onClick="checkInputs()"></center>
                </form>
        </div>
    </body>
</html>
