<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $mail;
	public $password;
	public $rememberMe;

	

	/**
	 * Declares the validation rules.
	 * The rules state that mail and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// mail and password are required
			array('mail, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Pea mind meeles',
		);	
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		// we only want to authenticate when no input errors
    if (! $this->hasErrors()) {
        $identity = new UserIdentity($this->mail, $this->password);
        $identity->authenticate();
        switch ($identity->errorCode) {
            case UserIdentity::ERROR_NONE:
                $duration = ($this->rememberMe)
                    ? 3600*24*14 // 14 days
                    : 0; // login till the user closes the browser
                Yii::app()->user->login($identity, $duration);
                break;

            default:
                // UserIdentity::ERROR_USERNAME_INVALID
                // UserIdentity::ERROR_PASSWORD_INVALID
                // UserIdentity::ERROR_MEMBER_NOT_APPOVED
                $this->addError('', Yii::t('auth',
                    'Vale email või parool'));
                break;
        }
    }

	}
}
