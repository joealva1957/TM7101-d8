<?php

namespace Drupal\itm_lab3\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Current date"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
          ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['current_date'] = [
      '#type' => 'date',
      '#title' => $this->t('Current date'),
      '#default_value' => $this->configuration['current_date'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['current_date'] = $form_state->getValue('current_date');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
	  		
	$request_time = \Drupal::time()->getRequestTime($type = 'long');
	  
    $build['default_block_current_date']['#markup'] = format_date($request_time, 'long');

    return $build; 
  }

}


