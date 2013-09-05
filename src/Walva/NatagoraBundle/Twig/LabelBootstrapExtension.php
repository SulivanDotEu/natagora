<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Walva\NatagoraBundle\Twig;

use \Twig_Extension;
use \Walva\NatagoraBundle\Entity\Formation;

/**
 * Description of BadgeBootstrapExtension
 *
 * @author Benjamin
 */
class LabelBootstrapExtension extends Twig_Extension {

    //put your code here

    public function getFilters() {
        return array(
            'label' => new \Twig_Filter_Method($this, 'getLabel'),
        );
    }
/*
 * {{ entity.lieu | label(2) | raw }}
 */
    public function getLabel($content, $color = 0) {
        if ($color == 0)
            $color = Formation::$COULEUR_BLEU;
        
        $string = '<span class="%s">%s</span>';
        $class;
        
        switch ($color) {
            case Formation::$COULEUR_BLEU:
                $class = "label label-info";
                break;
            case Formation::$COULEUR_GRIS:
                $class = "label";
                break;
            case Formation::$COULEUR_NOIR:
                $class = "label label-inverse";
                break;
            case Formation::$COULEUR_ORANGE:
                $class = "label label-warning";
                break;
            case Formation::$COULEUR_ROUGE:
                $class = "label label-important";
                break;
            case Formation::$COULEUR_VERT:
                $class = "label label-success";
                break;

            default:
                break;
        }
        
        $string = sprintf($string, $class, $content);
        
        return $string;
    }

    public function getName() {
        return 'label_bootstrap';
    }

}

?>
