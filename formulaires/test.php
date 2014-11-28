<?php

if (!defined('_ECRIRE_INC_VERSION')) return;



function formulaires_test_charger_dist() {
    // Contexte du formulaire.
    $contexte = array(
        '' => '',
    );

    return $contexte;
}

/*
 *   Fonction de vérification, cela fonction avec un tableau d'erreur.
 *   Le tableau est formater de la sorte:
 *   if (!_request('NomErreur')) {
 *       $erreurs['message_erreur'] = '';
 *       $erreurs['NomErreur'] = '';
 *   }
 *   Pensez à utiliser _T('info_obligatoire'); pour les éléments obligatoire.
 */
function formulaires_test_verifier_dist() {
    $erreurs = array();

    $erreurs['message_erreur'] = 'erreur';
    $erreurs['captcha_code'] = 'erreur_captcha';

    return $erreurs;
}

function formulaires_test_traiter_dist() {
    //Traitement du formulaire.

    // Donnée de retour.
    return array(
        'editable' => true,
        'message_ok' => '',
        'redirect' => ''
    );
}