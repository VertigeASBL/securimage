<?php
/**
 * Fonctions utiles au plugin Securimage
 *
 * @plugin     Securimage
 * @copyright  2014
 * @author     Vertige
 * @licence    GNU/GPL
 * @package    SPIP\Securimage\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function securimage_inserer($formulaire, $contexte) {
    // Ne pas ce prendre la tete, demander un coup de main à query_path
    include_spip('inc/querypath');
    // Récupérer le dernier <li> pour ajouter un LI le captcha
    $qp = spip_query_path($formulaire, 'ul:last-child li:last-child');

    // On récupère le html du captcha via la saisie qui va bien
    include_spip('inc/saisies');
    $captcha = saisies_generer_html(
        array(
            'saisie' => 'captcha',
            'options' => array('nom' => 'captcha_code') // Ce nom ne sert qu'a afficher la saisie
        ), $contexte
    );

    // On l'insere dans le html
    $formulaire = $qp->after($captcha)->top()->html();

    return $formulaire;
}

function securimage_verifier($captcha_code) {
    include_spip('lib/securimage/securimage');
    $securimage = new Securimage();

    // On vérifie
    return $securimage->check($captcha_code);
}
