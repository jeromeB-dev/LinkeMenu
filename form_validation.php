<?
$config = array(
    'registration' => array(
        array(
            'field' => 'userName', // username = user email
            'label' => 'Username',
            'rules' => array(
                'required',
                'valid_email',
                'is_unique[users.email]',
            ),
        ),
        array(
            'field' => 'inputPassword',
            'label' => 'Password',
            'rules' => array(
                'required',
                'min_length[6]',
                'max_length[12]',
                'alpha_numeric',
            ),
        ),
        array(
            'field' => 'passwordConfirm',
            'label' => 'Password Confirmation',
            'rules' => 'required|matches[inputPassword]',
        ),
    ),
);
