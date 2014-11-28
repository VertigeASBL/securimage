<?php
/**
 * Utilisations de pipelines par Securimage
 *
 * @plugin     Securimage
 * @copyright  2014
 * @author     Vertige
 * @licence    GNU/GPL
 * @package    SPIP\Securimage\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function securimage_formulaire_fond($flux) {
    $form_captcha = explode(',', _FORMULAIRE_CAPTCHA);
    $form_captcha = array_map('trim', $form_captcha);
    if (in_array($flux['args']['form'], $form_captcha)) {
        // Ajouter securimage au formulaire
        $flux['data'] = securimage_inserer($flux['data'], $flux['args']['contexte']);
    }

    return $flux;
}

// Quand on charge le formulaire, on active la session PHP
function securimage_formulaire_charger($flux) {
    session_start();
    return $flux;
}

function securimage_formulaire_verifier($flux) {

    $form_captcha = explode(',', _FORMULAIRE_CAPTCHA);
    $form_captcha = array_map('trim', $form_captcha);
    if (in_array($flux['args']['form'], $form_captcha)) {
        // Vérification du captcha
        $captcha_envoye = _request('captcha_code');

        // On test et on renvoie une erreur si néccessaire
        if (!securimage_verifier($captcha_envoye)) {
            // Message d'erreur général
            $flux['data']['message_erreur'] = _T('securimage:message_erreur');
            // Message d'erreur pour le champ de captche
            $flux['data']['captcha_code'] = _T('securimage:message_erreur');
        }
    }

    return $flux;
}