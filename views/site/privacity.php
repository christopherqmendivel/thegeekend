<?php

use yii\helpers\Html;

$this->title = 'Política de Privacidad - The Geekend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-privacy-policy">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        En The Geekend, la privacidad de nuestros usuarios es de suma importancia para nosotros. Esta Política de Privacidad
        describe cómo recopilamos, usamos, compartimos y protegemos su información cuando utiliza nuestros servicios.
        Por favor, tómese un momento para familiarizarse con nuestras prácticas de privacidad y contáctenos si tiene alguna pregunta.
    </p>

    <h2>Información que Recopilamos</h2>

    <p>
        Recopilamos información cuando se registra en nuestros eventos, se comunica con nosotros o utiliza nuestros servicios.
        La información que recopilamos puede incluir su nombre, dirección de correo electrónico, información de contacto y detalles del evento.
    </p>

    <h2>Uso de la Información</h2>

    <p>
        Utilizamos la información recopilada para proporcionar, mantener y mejorar nuestros servicios, así como para comunicarnos con usted
        y personalizar su experiencia en nuestros eventos. También podemos utilizar esta información para enviarle comunicaciones de marketing
        sobre nuestros próximos eventos, pero siempre le daremos la opción de optar por no recibir dichas comunicaciones.
    </p>

    <h2>Compartir Información</h2>

    <p>
        No compartiremos su información personal con terceros sin su consentimiento, excepto en las siguientes circunstancias:
    </p>

    <ul>
        <li>Para cumplir con la ley, responder a solicitudes legales o proteger nuestros derechos.</li>
        <li>Con proveedores de servicios que nos ayudan a operar nuestro negocio y brindar servicios a nuestros usuarios.</li>
        <li>En caso de una fusión, adquisición o venta de activos, en cuyo caso se notificará a los usuarios de cualquier cambio en la política de privacidad.</li>
    </ul>

    <h2>Seguridad de la Información</h2>

    <p>
        Nos esforzamos por proteger la seguridad de su información personal y utilizamos medidas de seguridad razonables para mantenerla segura.
        Sin embargo, ninguna transmisión por Internet o método de almacenamiento electrónico es 100% seguro, por lo que no podemos garantizar
        la seguridad absoluta de su información.
    </p>

    <h2>Actualizaciones de la Política de Privacidad</h2>

    <p>
        Podemos actualizar esta Política de Privacidad periódicamente y le notificaremos cualquier cambio mediante la publicación de la nueva
        Política de Privacidad en nuestro sitio web. Le recomendamos que revise esta Política de Privacidad regularmente para estar informado
        sobre cómo protegemos la información que recopilamos.
    </p>

    <p>
        Si tiene alguna pregunta sobre nuestra Política de Privacidad, no dude en <a href="<?= Html::encode(Yii::$app->urlManager->createUrl(['site/contact'])) ?>">contactarnos</a>.
    </p>
</div>
