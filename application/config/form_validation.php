<?
$config = array(
    'registration' => array(
        array(
            'field' => 'userName', // username = user email
            'label' => "Email / Nom d'utilisateur",
            'rules' => array(
                'required',
                'valid_email',
                'is_unique[users.email]',
            ),
        ),
        array(
            'field' => 'inputPassword',
            'label' => 'Mot de passe',
            'rules' => array(
                'required',
                'min_length[6]',
                'max_length[12]',
                'alpha_numeric',
            ),
        ),
        array(
            'field' => 'passwordConfirm',
            'label' => 'Confirmation du Mot de passe',
            'rules' => 'required|matches[inputPassword]',
        ),
    ),
    'establishment_edit' => array(
        array(
            'field' => 'name',
            'label' => 'Nom établissement',
            'rules' => 'required',
        ),
        array(
            'field' => 'address',
            'label' => 'Numéro et libellé',
            'rules' => 'required',
        ),
        array(
            'field' => 'zip_code',
            'label' => 'Code postal',
            'rules' => 'required|numeric|min_length[4]|max_length[5]',
        ),
        array(
            'field' => 'city',
            'label' => 'Ville',
            'rules' => 'required',
        ),
        array(
            'field' => 'phone',
            'label' => 'Numéro de tél',
            'rules' => array(
                'required',
                'min_length[10]',
                'max_length[20]',
                'regex_match[#^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.0-9]*$#]',
            ),
        ),
        array(
            'field' => 'website',
            'label' => 'Site web',
            'rules' => 'required|valid_url',
        ),
        array(
            'field' => 'url',
            'label' => 'Adresse personnalisée',
            'rules' => 'required|alpha_dash|callback_url_check',
        ),
    ),
    'add_category' => array(
        array(
            'field' => 'name',
            'label' => 'Nom de la catégorie',
            'rules' => array(
                'required',
            ),
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => array(
                'max_length[256]',
            ),
        ),
        array(
            'field' => 'image',
            'label' => "Lien de l'image",
            'rules' => 'valid_url',
        ),
    ),
);
