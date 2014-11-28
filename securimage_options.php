<?php
/**
 * Options du plugin Securimageau chargement
 *
 * @plugin     Securimage
 * @copyright  2014
 * @author     Vertige
 * @licence    GNU/GPL
 * @package    SPIP\Securimage\Options
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

// Valeur par défaut pour le captcha, aka le formulaire de test
if(!defined(_FORMULAIRE_CAPTCHA))
    define(_FORMULAIRE_CAPTCHA, 'test');