<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Endereço de destino
    $to = "suporte@alko.com.br";

    // Assunto do e-mail
    $email_subject = "Contato de: $name - $subject";

    // Corpo do e-mail
    $email_body = "Você recebeu uma mensagem de $name.\n\n".
                  "E-mail: $email\n\n".
                  "Mensagem:\n$message";

    // Cabeçalhos
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Erro ao enviar o e-mail. Tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>