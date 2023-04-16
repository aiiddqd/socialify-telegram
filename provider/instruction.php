<?php

?>
<details>
    <summary>Help</summary>
    <ol>
            <li>
                <span><?= __('Get keys you can by BotFather: ', 'socialify') ?></span>
                <a href="https://t.me/botfather" target="_blank">https://t.me/botfather</a>
            </li>
            <li>Callback URI: <code><?= self::get_callback_url() ?></code></li>
            <li>Site link: <code><?= site_url() ?></code></li>
            <li>Domain: <code><?= $_SERVER['SERVER_NAME'] ?></code></li>
        </ol>
</details>