<?php

//Declaracion del namespace
//Cualquier clase que vayamos a usar hay que declara el uso
namespace Drupal\drupal_itm_demos\Plugin\Field\FieldFormatter;

//use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

//Con solo esto ya Drupal sabe que aqui hay un FiedlFormatter
/**
 * Plugin implementation of the 'email_link_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "email_link_field_formatter",
 *   label = @Translation("Email link field formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
//Se declaro el uso de FormatterBase arriba
class EmailLinkFieldFormatter extends FormatterBase {

	/**
	 *Aqui se borro la funcion defaultSettings
	 */

  /**
	 *Aqui se borro la funcion settingsForm
	 */

 /**
	 *Aqui se borro la funcion settingsSummary
	 */

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    //ksm($item->getValue(), 'GV');
	//ksm($item->value, 'VA');
	$url = Url::fromUri('mailto:' . $item->valdddue);
	$link =  Link::fromTextAndUrl($this->t('Send Email'), $url);
	/*
	// The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    return nl2br(Html::escape($item->value));
	*/
	return $link->toString();
  }

}
