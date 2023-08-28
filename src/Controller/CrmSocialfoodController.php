<?php

namespace Drupal\crm_socialfood\Controller;

use Drupal\Core\Controller\ControllerBase; // Importa la clase ControllerBase

class CrmSocialfoodController extends ControllerBase // Extiende de ControllerBase
{
  public function crmsocialfoodtable() {
    // Carga el formulario y los botones de radio
    $form['changeform'] = [
      '#type' => 'container', // Utiliza un contenedor para encapsular el formulario.
      '#attributes' => ['class' => ['crm-socialfood-change-form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\CrmSocialfoodChangeForm'),
    ];
    $form['crm_socialfood_date_form'] = [
      '#type' => 'container', // Utiliza un contenedor para encapsular el formulario.
      '#attributes' => ['class' => ['crm_socialfood_date_form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\crm_socialfood_date_form'),
    ];
    $form['socialfoods_filters'] = [
      '#type' => 'container', // Utiliza un contenedor para encapsular el formulario.
      '#attributes' => ['class' => ['crm-socialfood-form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\crm_socialfood_filters'),
    ];
    $form['socialfoods_filters_users'] = [
      '#type' => 'container', // Utiliza un contenedor para encapsular el formulario.
      '#attributes' => ['class' => ['crm-socialfood-user-form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\crm_socialfood_filters_users'),
    ];
    $form['socialfoods'] = [
      '#type' => 'container', // Utiliza un contenedor para encapsular el formulario.
      '#attributes' => ['class' => ['crm-socialfood-form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\CrmSocialfoodTable'),
    ];
    $form['users'] = [
      '#type' => 'container',
      '#attributes' => ['class' => ['crm-socialfood-user-form']],
      'content' => \Drupal::formBuilder()->getForm('Drupal\crm_socialfood\Form\CrmSocialfoodUsersTable'),
    ];


    return $form;
  }
}
