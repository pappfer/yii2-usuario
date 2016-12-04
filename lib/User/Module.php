<?php

namespace Da\User;

use Da\User\Strategy\DefaultEmailChangeStrategy;

class Module extends \yii\base\Module
{
    /**
     * @var bool whether to allow registration process or not.
     */
    public $allowRegistration = true;
    /**
     * @var bool whether to generate passwords automatically and remove the password field from the registration form.
     */
    public $generatePasswords = false;
    /**
     * @var bool whether to force email confirmation to.
     */
    public $forceEmailConfirmation = true;
    /**
     * @var bool whether to allow login accounts with unconfirmed emails.
     */
    public $allowUnconfirmedEmailLogin = false;
    /**
     * @var bool whether to enable password recovery or not.
     */
    public $allowPasswordRecovery = true;
    /**
     * @var string the class name of the strategy class to handle user's email change.
     */
    public $emailChangeStrategy = DefaultEmailChangeStrategy::class;
    /**
     * @var int the time user will be auto logged in.
     */
    public $rememberLoginLifespan = 1209600;
    /**
     * @var int the time before the confirmation token becomes invalid. Defaults to 24 hours.
     */
    public $tokenConfirmationLifespan = 86400;
    /**
     * @var int the time before a recovery token is invalid. Defaults to 6 hours.
     */
    public $tokenRecoveryLifespan = 21600;
    /**
     * @var array a list of admin usernames
     */
    public $administrators = [];
    /**
     * @var string the administrator permission name
     */
    public $administratorPermissionName;
    /**
     * @var array the class map used by the module.
     *
     * @see Bootstrap
     */
    public $classmap = [];
    /**
     * @var string the route prefix
     */
    public $prefix = 'user';
    /**
     * @var array MailService configuration
     */
    public $mailParams = [];

    /**
     * @var array the url rules (routes)
     */
    public $routes = [
        '<id:\d+>' => 'profile/show',
        '<action:(login|logout)>' => 'auth/<action>',
        '<action:(register|resend)>' => 'registration/<action>',
        'confirm/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'registration/confirm',
        'forgot' => 'recovery/request',
        'recover/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'recovery/reset',
        'settings/<action:\w+>' => 'settings/<action>'
    ];
}