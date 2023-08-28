<?php

namespace Drupal\crm_socialfood\Form;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class crm_socialfood_date_form extends FormBase
{
  public function getFormId()
  {
    return 'crm_socialfood_date_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {


    $fecha_actual = date("d-m-Y");
    $fecha_año = date("d-m-Y", strtotime($fecha_actual . "- 365 days"));

    $form['fecha_inicio'] = [
      '#type' => 'datetime',
      '#title' => 'since',
      '#default_value' => DrupalDateTime::createFromTimestamp(strtotime($fecha_año)),
      '#date_date_element' => 'date',
      '#date_time_element' => 'none',
    ];
    $form['fecha_fin'] = [
      '#type' => 'datetime',
      '#title' => 'until',
      '#default_value' => DrupalDateTime::createFromTimestamp(strtotime($fecha_actual)),
      '#date_date_element' => 'date',
      '#date_time_element' => 'none',
    ];
   /* $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Calcular'),
    ];  */

    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $form_state->setRebuild(TRUE);
    // Save Commerce Google Trusted Store Variables.
    \Drupal::configFactory()->getEditable('commerce_data_driven_organization.settings')->set('commerce_data_driven_organization_date_start', $form_state->getValue(['commerce_data_driven_organization_date_start']))->save();
    \Drupal::configFactory()->getEditable('commerce_data_driven_organization.settings')->set('commerce_data_driven_organization_date_end', $form_state->getValue(['commerce_data_driven_organization_date_end']))->save();
  }
}
