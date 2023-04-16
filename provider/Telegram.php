<?php 

namespace Socialify;


final class Telegram extends ProviderAbstract
{
    use ProviderTrait;

    public static $provider_id = 'telegram';
    public static $provider_title = 'Telegram';
    
    public static $config_app_id = 'telegram_client_id';
    public static $config_app_secret = 'telegram_client_secret';

    public static function init()
    {
        parent::init();
    }

    public static function api_handle($req)
    {
        
        $config_data = self::get_config();
        if (empty($config_data[self::$config_app_id]) || empty($config_data[self::$config_app_secret])) {
            return false;
        }

        $config = [
            'callback' => self::get_callback_url(),
            'keys'     => [
                'id'     => $config_data[self::$config_app_id],
                'secret' => $config_data[self::$config_app_secret],
            ]
        ];

        $adapter = new \Hybridauth\Provider\Telegram($config);

        if(!empty($_GET['redirect_to'])){
            $redirect_to = $_GET['redirect_to'];
            $adapter->getStorage()->set('socialify_redirect_to', $redirect_to);
        }


        if($adapter->isConnected()){
            //
        } else {
            include_once(__DIR__ . '/template-login.php');
            exit;
        }

        $data = [
            'user_profile' => $adapter->getUserProfile(),
            'redirect_to' => $adapter->getStorage()->get('socialify_redirect_to'),
        ];

        $adapter->disconnect();

        do_action('socialify_auth_handle', $data['user_profile'], self::$provider_id, $data['redirect_to']);

        return $data;
    }

    /**
     * Add settings
     */
    public static function add_settings()
    {
        $section_id = self::$provider_id;
        add_settings_section(
            $section_id,
            self::$provider_title,
            function(){
                include_once __DIR__ . '/instruction.php';
            },
            self::$option_page
        );

        add_settings_field(
            self::$config_app_id,
            'Bot Name',
            function ($args) {
                printf(
                    '<input type="text" name="%s" value="%s" size="77">',
                    $args['name'], $args['value']
                );
            },
            self::$option_page,
            $section_id,
            $args = [
                'name' => sprintf('%s[%s]', self::$option_key, self::$config_app_id),
                'value' => self::get_config()[self::$config_app_id] ?? '',
            ]
        );
    
        add_settings_field(
            self::$config_app_secret,
            'Secret Token',
            function ($args) {
                printf(
                    '<input type="text" name="%s" value="%s" size="77">',
                    $args['name'], $args['value']
                );
            },
            self::$option_page,
            $section_id,
            $args = [
                'name' => sprintf('%s[%s]', self::$option_key, self::$config_app_secret),
                'value' => self::get_config()[self::$config_app_secret] ?? '',
            ]
        );
    }


}

Telegram::init();
