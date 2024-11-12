<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Asegúrate de que este archivo esté en la raíz del proyecto

$active = "Contactanos";
include("includes/header.php");
?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li>Contactanos</li>
            </ul>

            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Sientete seguro de contactarnos</h2>
                            <p class="text-muted">Por cualquier pregunta, eres libre de contactarnos.</p>
                        </center>

                        <form action="contact.php" method="post">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>e-mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Asunto</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Enviar mensaje
                                </button>
                            </div>
                        </form>

                        <?php
                     if (isset($_POST['submit'])) {
                        $user_nombre = $_POST['name'];
                        $user_email = $_POST['email'];
                        $user_asun = $_POST['subject'];
                        $user_msg = $_POST['message'];
                        $res_email = "lautacamejo6@gmail.com";
                    
                        // Validar el correo electrónico ingresado por el usuario
                        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                            echo "<h2 align='center'>Correo electrónico inválido. Por favor, verifica tu dirección de correo.</h2>";
                        } else {
                            $mail = new PHPMailer(true);
                            try {
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'lautacamejo6@gmail.com';
                                $mail->Password = 'jynqgpcsbphvkifs'; // Contraseña de aplicación
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                $mail->Port = 465;
                    
                                $mail->setFrom($user_email, $user_nombre);
                                $mail->addAddress($res_email);
                    
                                $mail->isHTML(true);
                                $mail->Subject = $user_asun;
                    
                                // Agregar el correo del remitente al cuerpo del mensaje
                                $mail->Body = "Mensaje de: $user_nombre ($user_email)<br><br>" . nl2br($user_msg);
                    
                                $mail->send();
                                echo "<h2 align='center'>Tu mensaje se envió correctamente</h2>";
                    
                                // Auto-respuesta al usuario
                                $mail->clearAddresses();
                                $mail->addAddress($user_email);
                                $mail->Subject = "Bienvenido a nuestro sitio web";
                                $mail->Body = "Gracias por enviarnos su mensaje, responderemos lo más pronto posible.";
                                $mail->send();
                    
                            } catch (Exception $e) {
                                echo "<h2 align='center'>Hubo un error al enviar tu mensaje. Error: {$mail->ErrorInfo}</h2>";
                            }
                        }
                    }
                    
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>
</html>
