<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
</head>
<body>
   <p>Recibiste un mensaje de :<?php echo e($msg['nombre']); ?> - <?php echo e($msg['email']); ?> </p>
   <p><strong>Telefono: </strong> <?php echo e($msg['subject']); ?> </p>
   <p><strong>contenido:</strong><?php echo e($msg['content']); ?> </p>
   <p><strong>Acepto la politica de privacidad:</strong><?php echo e($msg['checkbox']); ?></p>
</body>
</html><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/emails/message-received.blade.php ENDPATH**/ ?>