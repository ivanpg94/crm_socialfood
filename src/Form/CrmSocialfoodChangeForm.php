<?php

namespace Drupal\crm_socialfood\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

class CrmSocialfoodChangeForm extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'crm_socialfood_change_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form = [];
    $module_path = \Drupal::moduleHandler()->getModule('crm_socialfood')->getPath();
    $image_path = $module_path . '/img/header.jpg';

    $image_url = Url::fromUri(file_create_url($image_path));

    $form['container'] = [
      '#type'  => 'fieldset',
      '#open'  => true,
      '#attributes' => ['class' => ['crm-container']],
    ];
    $form['container']['header_image'] = [
      '#markup' => '<img src="' . $image_url->toString() . '" alt="Cabecera de formulario">',
      '#attributes' => ['class' => ['crm-header-img']],
    ];
    $form['container']['title'] = [
      '#markup' => '<h1>CRM</h1>',
      '#attributes' => ['class' => ['crm-title-header']],
    ];

    $form['radio_buttons'] = [
      '#type' => 'radios',
      '#options' => [
        'form' => $this->t('Socialfoods'),
        'form1' => $this->t('Users'),
        'form2' => $this->t('Living Lab'),
        'form3' => $this->t('FoodLab'),
      ],
      '#attributes' => ['class' => ['crm-radio']],
      '#default_value' => 'form',
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

  }

}

