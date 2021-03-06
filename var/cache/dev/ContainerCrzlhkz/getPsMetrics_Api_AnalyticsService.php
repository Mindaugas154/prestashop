<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'ps_metrics.api.analytics' shared service.

return $this->services['ps_metrics.api.analytics'] = new \PrestaShop\Module\Ps_metrics\Api\AnalyticsApi(${($_ = isset($this->services['ps_metrics.api.client.analytics']) ? $this->services['ps_metrics.api.client.analytics'] : $this->load('getPsMetrics_Api_Client_AnalyticsService.php')) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.analytics']) ? $this->services['ps_metrics.env.analytics'] : ($this->services['ps_metrics.env.analytics'] = new \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->load('getPsMetrics_Helper_JsonService.php')) && false ?: '_'});
