<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // walva_user_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'walva_user_homepage')), array (  '_controller' => 'WalvaUserBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/formation')) {
                // formation
                if (rtrim($pathinfo, '/') === '/admin/formation') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'formation');
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::indexAction',  '_route' => 'formation',);
                }

                // formation_show
                if (preg_match('#^/admin/formation/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formation_show')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::showAction',));
                }

                // formation_new
                if ($pathinfo === '/admin/formation/new') {
                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::newAction',  '_route' => 'formation_new',);
                }

                // formation_create
                if ($pathinfo === '/admin/formation/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_formation_create;
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::createAction',  '_route' => 'formation_create',);
                }
                not_formation_create:

                // formation_edit
                if (preg_match('#^/admin/formation/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formation_edit')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::editAction',));
                }

                // formation_update
                if (preg_match('#^/admin/formation/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_formation_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formation_update')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::updateAction',));
                }
                not_formation_update:

                // formation_delete
                if (preg_match('#^/admin/formation/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_formation_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formation_delete')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormationController::deleteAction',));
                }
                not_formation_delete:

            }

            if (0 === strpos($pathinfo, '/admin/lieu')) {
                // lieu
                if (rtrim($pathinfo, '/') === '/admin/lieu') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'lieu');
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::indexAction',  '_route' => 'lieu',);
                }

                // lieu_show
                if (preg_match('#^/admin/lieu/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'lieu_show')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::showAction',));
                }

                // lieu_new
                if ($pathinfo === '/admin/lieu/new') {
                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::newAction',  '_route' => 'lieu_new',);
                }

                // lieu_create
                if ($pathinfo === '/admin/lieu/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_lieu_create;
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::createAction',  '_route' => 'lieu_create',);
                }
                not_lieu_create:

                // lieu_edit
                if (preg_match('#^/admin/lieu/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'lieu_edit')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::editAction',));
                }

                // lieu_update
                if (preg_match('#^/admin/lieu/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_lieu_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'lieu_update')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::updateAction',));
                }
                not_lieu_update:

                // lieu_delete
                if (preg_match('#^/admin/lieu/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_lieu_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'lieu_delete')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\LieuController::deleteAction',));
                }
                not_lieu_delete:

            }

            if (0 === strpos($pathinfo, '/admin/formateur')) {
                // formateur
                if (rtrim($pathinfo, '/') === '/admin/formateur') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'formateur');
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::indexAction',  '_route' => 'formateur',);
                }

                // formateur_show
                if (preg_match('#^/admin/formateur/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formateur_show')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::showAction',));
                }

                // formateur_new
                if ($pathinfo === '/admin/formateur/new') {
                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::newAction',  '_route' => 'formateur_new',);
                }

                // formateur_create
                if ($pathinfo === '/admin/formateur/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_formateur_create;
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::createAction',  '_route' => 'formateur_create',);
                }
                not_formateur_create:

                // formateur_edit
                if (preg_match('#^/admin/formateur/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formateur_edit')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::editAction',));
                }

                // formateur_update
                if (preg_match('#^/admin/formateur/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_formateur_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formateur_update')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::updateAction',));
                }
                not_formateur_update:

                // formateur_delete
                if (preg_match('#^/admin/formateur/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_formateur_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'formateur_delete')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\FormateurController::deleteAction',));
                }
                not_formateur_delete:

            }

            if (0 === strpos($pathinfo, '/admin/evenement')) {
                // evenement
                if (rtrim($pathinfo, '/') === '/admin/evenement') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'evenement');
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::indexAction',  '_route' => 'evenement',);
                }

                // evenement_show
                if (preg_match('#^/admin/evenement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_show')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::showAction',));
                }

                // evenement_new
                if ($pathinfo === '/admin/evenement/new') {
                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::newAction',  '_route' => 'evenement_new',);
                }

                // evenement_create
                if ($pathinfo === '/admin/evenement/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_evenement_create;
                    }

                    return array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::createAction',  '_route' => 'evenement_create',);
                }
                not_evenement_create:

                // evenement_edit
                if (preg_match('#^/admin/evenement/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_edit')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::editAction',));
                }

                // evenement_update
                if (preg_match('#^/admin/evenement/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_evenement_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_update')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::updateAction',));
                }
                not_evenement_update:

                // evenement_delete
                if (preg_match('#^/admin/evenement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_evenement_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_delete')), array (  '_controller' => 'Walva\\NatagoraBundle\\Controller\\EvenementController::deleteAction',));
                }
                not_evenement_delete:

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Walva\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}